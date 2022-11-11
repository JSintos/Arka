<template>
    <div class="chat-box">
        <div class="message" v-for="message in messages" :key="message.id" >
            <div class="message-inner">
                <div class="username">{{ message.user.username }}</div>
                <div class="message-content">{{ message.message }}</div>
            </div>
        </div>
        </div>
        
</template>

<style scoped>
.chat-box {
	background-color: #FFF;
    flex: 1 1 100%;
    padding: 30px 30px 0px 30px;
}
.message-content {
    display: flex;
	margin-bottom: 15px;
}
.username {
    color: #888;
    font-size: 16px;
    margin-bottom: 5px;
    padding-left: 15px;
    padding-right: 15px;
}
.message-content {
    display: inline-block;
    padding: 10px 20px;
    background-color: #F3F3F3;
    border-radius: 999px;
    color: #333;
    font-size: 18px;
    line-height: 1.2em;
    text-align: left;
}

</style>

<script>
export default {
    props: ["messages"],
};
</script>
