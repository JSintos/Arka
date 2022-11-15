<template>
    <!-- Display an input field and a send button. -->
    <div class="input-group">
        <!-- Input field. -->
        <!-- Call sendMessage() when the enter key is pressed. -->
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-field"
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
        />
        <!-- Button -->
        <span class="input-group-btn">
            <!-- Call sendMessage() this button is clicked. -->
            <button
                class="form-control send-btn"
                id="btn-chat"
                @click="sendMessage"
            >
                Send
            </button>
        </span>
    </div>
</template>

<style scoped>
.input-field {
    appearance: none;
    border: none;
    outline: none;
    background: none;
    display: inline-block;
    width: 100%;
    height: 48px;
    padding: 10px 15px;
    border-radius: 8px 0px 0px 8px;
    color: #333;
    font-size: 18px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
    background-color: #f3f3f3;
    transition: 0.4s;
}
.send-btn {
    appearance: none;
    border: none;
    outline: none;
    background: none;
    display: inline-block;
    padding: 10px 15px;
    border-radius: 0px 8px 8px 0px;
    background-color: #90ccf4;
    color: #fff;
    font-size: 18px;
    font-weight: 700;
}
</style>

<script>
export default {
    //Takes the "user" props from <chat-form> … :user="{{ Auth::user() }}"></chat-form> in the parent chat.blade.php.
    props: ["user", "communityId"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendMessage() {
            let filter = new Filter();

            let cleanedMessage = filter.clean(this.newMessage);

            //Emit a "messagesent" event including the user who sent the message along with the message content
            this.$emit("messagesent", {
                user: this.user,
                //newMessage is bound to the earlier "btn-input" input field
                message: cleanedMessage,
            });
            //Clear the input
            this.newMessage = "";
        },
    },
};
</script>
