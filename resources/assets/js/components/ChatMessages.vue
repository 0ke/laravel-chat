<template>
    <div class="chat-message">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ message.name }}</h3>
                <p>{{ message.message }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['message'],
        mounted() {
        }
    }
</script>
