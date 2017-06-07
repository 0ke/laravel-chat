<template>
    <textarea id="text-field-textarea" @keyup.enter="addMessage" v-model="message" style="width: 100%; height: 100%; border: none;resize: none;box-sizing: border-box; margin: 0; padding: 5px;" placeholder="Scrivi qui il tuo messaggio">
                            </textarea>
</template>

<script>
    export default {
        props : [],
        data : function(){
            return {
                message : ''
            }
        },
        mounted() {
        },
        methods :{
            addMessage(){
                this.$emit('addmessage',this.message);
                this.message = '';
            }
        }
    }
</script>
