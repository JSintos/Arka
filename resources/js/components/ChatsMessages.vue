<template>
    <ul class="chat">
        <li
            class="left clearfix"
            v-for="chatmessage in chatmessages"
            :key="chatmessage.id"
        >
            <div class="clearfix">
                <div class="header">
                    <strong>
                        {{ chatmessage.user.username }}
                    </strong>
                </div>
                <p>
                    {{ chatmessage.message }}
                </p>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    props: ["chatmessages"],
};
</script>
