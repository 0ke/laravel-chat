<template>
    <div>
        <bootstrap-menu :menus="chat.menu" :id="'chat-menu-bar'" @fired="fire"></bootstrap-menu>
        <div id="chat-box" class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
            <div id="sub-chat-box" style="height: 100%;margin-bottom: 0;" class="panel panel-default">
                <div id="chat-panel-heading" class="panel-heading">{{ chat.title }}</div>
                <div id="chat-panel-body" style="padding: 0;" class="panel-body">
                    <div class="chat-box message-box col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <chat-message v-for="message in messages" :message="message" key="message.id"></chat-message>
                    </div>
                    <div class="chat-box users-box col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <chat-user v-for="user in users" :user="user" key="user.id"></chat-user>
                    </div>
                    <div id="text-field" class="chat-box text-field col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <chat-new-message @addmessage="addmessage"></chat-new-message>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('chat-message', require('./Chat/ChatMessages.vue'));
    Vue.component('chat-user', require('./Chat/ChatUsers.vue'));
    Vue.component('chat-new-message', require('./Chat/ChatNewMessages.vue'));

    export default {
        props : ['chat'],
        mounted() {
            this.loadUsers();
            this.loadMessages();
        },
        computed : {
        },
        data : function(){
            return {
                users : [],
                messages : []
            }
        },
        methods :{
            fire(method){
                this[method]();
            },
            logout(){
                console.log('logout')
                this.users = [];
                this.messages = [];

                //Fare chiamata axios
                window.location.href = '/rooms';
            },
            loadUsers(){
                //Fare con axios
                let users = [
                    {
                        id : 1,
                        name: 'John'
                    },
                    {
                        id : 2,
                        name: 'Pluto',
                    },
                    {
                        id : 3,
                        name: 'Pippo'
                    },
                    {
                        id : 4,
                        name: 'Paperino'
                    }
                ];
                this.users = users;
            },
            loadMessages(){
                let messages =  [
                    {
                        id : 1,
                        name: 'John',
                        message : 'Ciao',
                        datetime : '11/10/2022 11:11:11'
                    },
                    {
                        id : 2,
                        name: 'Pluto',
                        message : 'Ciao',
                        datetime : '11/10/2022 11:12:11'
                    },
                    {
                        id : 3,
                        name: 'John',
                        message : 'COme stai',
                        datetime : '11/10/2022 11:13:11'
                    },
                    {
                        id : 4,
                        name: 'Pluto',
                        message : 'Bene dai',
                        datetime : '11/10/2022 11:14:11'
                    },
                    {
                        id : 5,
                        name: 'Pippo',
                        message : 'Ciao a tutti',
                        datetime : '11/10/2022 11:151:11'
                    },
                ];


                this.messages = messages;
            },

            addmessage(message){
                let newMessage = {
                    name : 'pippo',
                    message : message,
                    datetime : '11/10/2022 11:41:11'
                };
                this.messages.push(newMessage);

                // Axios send new message to server and Broadcast message to all users

            }
        }
    }
</script>
