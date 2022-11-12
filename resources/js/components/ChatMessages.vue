<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages" :key="message.id">
            <div class="clearfix">
                <div class="header">
                    <strong>
                        {{ message.user.username }}
                        <span v-if="message.user_userId !== user.userId">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="firstBadge(message.user.userId)"
                            >
                                badge # 1
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                @click="secondBadge(message.user.userId)"
                            >
                                badge # 2
                            </button>
                            <button
                                type="button"
                                class="btn btn-info"
                                @click="thirdBadge(message.user.userId)"
                            >
                                badge # 3
                            </button>
                            <button
                                type="button"
                                class="btn btn-danger"
                                @click="reportUser(message.user.userId)"
                            >
                                report
                            </button>
                        </span>
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
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
    props: ["messages", "user"],
    methods: {
        firstBadge(id) {
            this.$emit("firstbadge", {
                userId: id,
            });
        },
        secondBadge(id) {
            this.$emit("secondbadge", {
                userId: id,
            });
        },
        thirdBadge(id) {
            this.$emit("thirdbadge", {
                userId: id,
            });
        },
        reportUser(id) {
            var reportDesc = prompt();
            this.$emit("reportuser", {
                userId: id,
                reportDescription: reportDesc,
            });
        },
    },
};
</script>
