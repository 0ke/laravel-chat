<template>
    <li><a href="#">{{ user.name }}</a></li>
</template>

<script>
    export default {
        props : ['user'],
        mounted() {
        }
    }
</script>
