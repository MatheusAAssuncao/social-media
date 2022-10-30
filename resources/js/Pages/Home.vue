<template>
    
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1>List of users</h1>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <ul>
                <li v-for="friend in friends">
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
            </ul>
        </div>
    </div>
    <!-- <br>
    <Link href="/connections">Go to connections</Link> -->
</template>

<script>
    export default {
        props: {
            friends: Array
        }
    }
</script>
    
<style>

</style>