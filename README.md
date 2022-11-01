# Social Network
## Docker + Laravel + Vue + Inertia + MySql

Project SPA for studying through PHP laravel and Vue.js
## Requeriments
- Docker installed

## Features

- Choose a user in a group list based on database/seeders/socialGraph.json;
- Direct friends: list people who are directly connected to the chosen user;
- Friends of friends: those who are two steps away from the chosen user but not directly connected to the chosen user;
- Suggested friends: people in the group who know 2 or more direct friends of the chosen user but are not directly connected to the chosen user;

## Installation

Just Docker is required to use the application. This guide was made to facilitate the visualization and is not prepared for development.
To continue the development, node and composer are required, also some changes in dockerfiles/docker-compose.yaml like sharing Laravel and database volumes between container and host.
Inside the project folder, run:
```sh
docker-compose up --build -d
```
Then, enter into docker container to execute Laravel migration and create the database structure
```sh
docker exec -it laravel-docker bash
```
Inside the container, run:
```sh
php artisan migrate:refresh --seed
```
It is done!
From outside of the container, Nginx server is visible on http://localhost:9001 and MySql on localhost:9002.
Check .env file to see the connection informations.
## To do

##### 1. Implement cities rating
- Each user has also visited 0 or more cities and has a % rating for each city visited;
- Recommends cities to a user based on the social graph;
- The user must not have visited any city which is recommended to them.

##### 2. Test coverage
##### 3. Create layout
##### 4. Planning: the sky is the limit!
<br>
> Note: project suggested by the [**Landbell Group.**](https://landbell-group.com/) and developed by me (:

