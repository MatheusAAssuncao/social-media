<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Roboto', sans-serif;
            }
        </style>

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>
    <body class="antialiased">
        <div id="app">
            <input type="text" v-model="message">
            <h1>@{{message}}</h1>
            <ul>
                <li v-for="friend in friends">
                    @{{friend.firstName}} @{{friend.surname}}
                </li>
            </ul>
        </div>


        <script>
            var data = {
                message: 'Hello World',
                friends: [
                    {firstName: 'Jane', surname: 'Doe'},
                    {firstName: 'John', surname: 'Doe'},
                    {firstName: 'Jack', surname: 'Doe'},
                ],
            }
            
            const { createApp } = Vue

            createApp({
                data() {
                    return data
                }
            }).mount('#app')
        </script>
    </body>
</html>
