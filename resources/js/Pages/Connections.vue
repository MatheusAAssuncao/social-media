<template>
    <h1>{{ friends }}</h1>
    <br>
    <Link href="/">Back to home</Link>
</template>

<script>
    export default {
        props: {
            friends: String
        }
    }
</script>
    
<style>

</style>