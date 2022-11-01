<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserConnection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();

        $data = [
            'users' => $users,
        ];

        return Inertia::render('Home', $data);
    }

    public function get_friends($id_user)
    {
        $user = User::find($id_user)->toArray();
        $friends = $this->get_friends_of($id_user);

        $data = [
            'user' => $user,
            'friends' => $friends,
        ];

        return Inertia::render('Friends', $data);
    }

    public function get_friends_of_friend($id_user, $id_friend)
    {
        $user = User::find($id_user)->toArray();
        $friend = User::find($id_friend)->toArray();

        $friends = $this->get_friends_of($id_user);
        $friends_of_main_user = array_column($friends, 'id');
        array_push($friends_of_main_user, $id_user);
        $friends_of_friend = $this->get_friends_of($id_friend, $friends_of_main_user);

        $data = [
            'user' => $user,
            'friend' => $friend,
            'friends_of_friend' => $friends_of_friend,
        ];

        return Inertia::render('FriendsOfFriend', $data);
    }

    private function get_friends_of($id_user, array $not_in = []) : array
    {
        $result = UserConnection::join('users', 'users.id', '=', 'user_connections.friend_id')
            ->select('users.id', 'users.firstName', 'users.surname', 'users.age', 'users.gender')
            ->where('user_connections.user_id', '=', $id_user);
        
        if (!empty($not_in)) {
            $result = $result->whereNotIn('user_connections.friend_id', $not_in);
        }

        return $result->getQuery()->get()->toArray();
    }
}
