
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat', require('./components/Chat.vue'));
Vue.component('chat-message', require('./components/ChatMessages.vue'));
Vue.component('chat-user', require('./components/ChatUsers.vue'));
Vue.component('chat-new-message', require('./components/ChatNewMessages.vue'));

const app = new Vue({
    el: '#app',
    data : {
        user : {
          name : 'Pippo'
        }
    },
    computed:{
      chat(){
          return window.Chat;
      }
    },
    methods:{
    },
    mounted(){ //created()

    }
});

require('./broadcast.js');