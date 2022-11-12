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
</template>
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
