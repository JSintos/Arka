if (window.location.pathname.includes("chat")) {
    var splitPathname = window.location.pathname.split("/");
    var channelName = splitPathname[2];

    console.log(splitPathname);

    var client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

    var localTracks = {
        audioTrack: null,
    };
    var remoteUsers = {};
    // Agora client options
    var options = {
        appid: "f9f662297a6342999bb461d15a30a86e",
        channel: channelName,
        uid: null,
        token: null,
    };

    var isJoined = false;
    var isMuteAudio = false;

    $("#joinOrLeaveBtn").click(async function (e) {
        if (!isJoined) {
            isJoined = true;
            $("#joinOrLeaveBtn").text("leave");
            await join();
        } else {
            isJoined = false;
            $("#joinOrLeaveBtn").text("join");
            await leave();
        }
    });

    async function join() {
        // add event listener to play remote tracks when remote user publishs.
        client.on("user-published", handleUserPublished);
        client.on("user-unpublished", handleUserUnpublished);

        // join a channel and create local tracks, we can use Promise.all to run them concurrently
        [options.uid, localTracks.audioTrack] = await Promise.all([
            // join the channel
            client.join(options.appid, options.channel, options.token || null),
            // create local tracks, using microphone and camera
            AgoraRTC.createMicrophoneAudioTrack(),
        ]);

        // publish local tracks to channel
        await client.publish(Object.values(localTracks));
        console.log("publish success");
    }

    $("#muteBtn").click(function () {
        if (!isMuteAudio) {
            localTracks.audioTrack.setEnabled(false);
            $("#muteBtn").text("unmute");
            isMuteAudio = true;
        } else {
            localTracks.audioTrack.setEnabled(true);
            $("#muteBtn").text("mute");
            isMuteAudio = false;
        }
    });

    $("#localAudioVolume").on("change", function (evt) {
        localTracks.localAudioTrack.setVolume(parseInt(evt.target.value));
    });

    $("#remoteAudioVolume").on("change", function (evt) {
        localTracks.remoteAudioTrack.setVolume(parseInt(evt.target.value));
    });

    async function leave() {
        for (trackName in localTracks) {
            var track = localTracks[trackName];
            if (track) {
                track.stop();
                track.close();
                localTracks[trackName] = undefined;
            }
        }

        // leave the channel
        await client.leave();
    }

    async function subscribe(user, mediaType) {
        const uid = user.uid;
        // subscribe to a remote user
        await client.subscribe(user, mediaType);

        if (mediaType === "audio") {
            user.audioTrack.play();
        }
    }

    function handleUserPublished(user, mediaType) {
        const id = user.uid;
        remoteUsers[id] = user;
        subscribe(user, mediaType);
    }

    function handleUserUnpublished(user) {
        const id = user.uid;
        delete remoteUsers[id];
        $(`#player-wrapper-${id}`).remove();
    }
}
