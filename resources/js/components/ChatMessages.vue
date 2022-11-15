<template>
    <div class="chat-box">
        <div class="message" v-for="message in messages" :key="message.id">
            <div class="message-inner">
                <div class="username">
                    {{ message.user.username }}
                    <span v-if="message.user_userId !== user.userId">
                        <div class="btn-group">
                            <button
                                type="button"
                                class="btn btn-sm dropdown-toggle"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                More
                            </button>
                            <ul class="dropdown-menu dropdown-item-padding-y">
                                <p class="ml-4">Badges:</p>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        @click="firstBadge(message.user.userId)"
                                        ><i class="fa-solid fa-heart mr-2"></i
                                        >Empath</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        @click="
                                            secondBadge(message.user.userId)
                                        "
                                        ><i class="fa-solid fa-brain mr-2"></i
                                        >Genius</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        @click="thirdBadge(message.user.userId)"
                                        ><i class="fa-solid fa-hand mr-2"></i
                                        >Kind</a
                                    >
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li class="p-2">
                                    <a
                                        type="button"
                                        class="btn btn-danger"
                                        :href="'/report/' + message.user.userId"
                                    >
                                        <i class="fa-solid fa-flag mr-2"></i
                                        >report
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </span>
                </div>
                <div class="message-content">{{ message.message }}</div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.chat-box {
    background-color: #fff;
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
    background-color: #f3f3f3;
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
    },
};
</script>
