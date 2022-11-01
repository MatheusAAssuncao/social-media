<template>
    <div class="container">
        <div class="row menu">
            <Link href="/">Home</Link>
            <Link v-bind:href="'/friends/' + user.id">Back to {{ user.firstName }} {{ user.surname }}'s friend</Link>
        </div>
        <div class="row">
            <div class="page-header">
                <h1>Friends of {{ user.firstName }} {{ user.surname }}'s friend {{ friend.firstName }} {{ friend.surname }}</h1>
                <h3>That {{ user.firstName }} {{ user.surname }} does not know</h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <ul>
                <div v-for="friend in friends_of_friend">
                    <li>
                        <div class="name">
                            {{ friend.firstName }} {{ friend.surname }}
                        </div>
                        <div class="age">
                            {{ friend.age }} years old
                        </div>
                        <div class="gender">
                            <small>{{ friend.gender }}</small>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Array,
            friend: Array,
            friends_of_friend: Array,
        }
    }
</script>
    
<style>

</style>