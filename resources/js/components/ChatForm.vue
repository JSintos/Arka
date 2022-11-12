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
            class="btn send-btn"
                id="btn-chat"
                @click="sendMessage"
            >
                Send
            </button>
        </span>
    </div>
</template>

<style scoped>
.input-field{
    appearance: none;
    border: none;
    outline: none;
    background: none;
    display: block;
    width: 100%;
    height: 50px;
    padding: 10px 15px;
    border-radius: 8px 0px 0px 8px;
    color: #333;
    font-size: 18px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
    background-color: #F3F3F3;
    transition: 0.4s;
}
.send-btn {
    appearance: none;
    border: none;
    outline: none;
    background: none;
    display: block;
    padding: 10px 15px;
    border-radius: 0px 8px 8px 0px;
    background-color: #90CCF4;
    color: #FFF;
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
            //Emit a "messagesent" event including the user who sent the message along with the message content
            this.$emit("messagesent", {
                //newMessage is bound to the earlier "btn-input" input field
                message: this.newMessage,
                commId: this.communityId,
            });
            //Clear the input
            this.newMessage = "";
        },
    },
};
</script>
