<template>
    <div class="content-chat">
        <div class="list" v-chat-scroll style="max-height: 500px; overflow-y: scroll">
            <div class="chat-item" v-bind:class="{ gray: user.id === message.user.id, green: companion.id === message.user.id }" v-for="message in messages" :key="message.id">
                <div class="avatar">
                    <img src="/assets/img/avatars/avatar15.jpg" :alt="message.user.name">
                </div>
                <div class="text">
                    <div class="time">{{ message.created_at }}</div>
                    <div class="content">{{ message.text }}</div>
                </div>
            </div>
        </div>
        <div class="send-message">
            <div class="inner">
                <input type="text" class="form-control" v-model="newMessage" @keyup.enter="sendMessage" placeholder="Введите сообщение...">
                <button class="btn btn-light-green" v-on:click="sendMessage"><i class="fas fa-paper-plane"></i> <span>Отправить</span></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages: [],
                newMessage: ''
            }
        },
        props: ['chatId', 'companion', 'user'],
        created() {
            setInterval(this.fetchMessages, 1000);
        },
        methods: {
            fetchMessages() {
                axios.get(`/api/messages?chat_id=${this.chatId}`).then(response => {
                    this.messages = response.data;
                });
            },
            sendMessage() {
                axios.post('/api/messages', { 'chatId': this.chatId, 'message': this.newMessage }).then(response => {
                    this.messages.push(response.data);
                    this.newMessage = '';
                });
            }
        }
    }
</script>
