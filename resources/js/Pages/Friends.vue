<template>
    <div class="container">
        <div class="row menu">
            <Link href="/">Home</Link>
        </div>
        <div class="row">
            <div class="page-header">
                <h1>{{ user.firstName }} {{ user.surname }} direct friends</h1>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <ul>
                <div v-for="friend in friends">
                    <Link v-bind:href="'/friends-of-friend/' + user.id + '/' + friend.id">
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
                    </Link>
                </div>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Array,
            friends: Array,
        }
    }
</script>
    
<style>

</style>