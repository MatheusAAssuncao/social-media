<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->toArray();

        return Inertia::render('Home', [
            'users' => $users,
        ]);
    }

    public function get_friends($id_user)
    {
        $_user_service = new UserService($id_user);
        $user = User::find($id_user)->toArray();
        $friends = $_user_service->get_friends_of();
        $sugesteds = $_user_service->get_sugested_friends();

        return Inertia::render('Friends', [
            'user' => $user,
            'total_friends' => count($friends),
            'friends' => $friends,
            'total_sugesteds' => count($sugesteds),
            'sugesteds' => $sugesteds,
        ]);
    }

    public function get_friends_of_friend($id_user, $id_friend)
    {
        $_user_service = new UserService($id_user);
        $user = User::find($id_user)->toArray();
        $friend = User::find($id_friend)->toArray();

        $friends = $_user_service->get_friends_of();
        $friends_of_main_user = array_column($friends, 'id');
        array_push($friends_of_main_user, $id_user);
        $friends_of_friend = $_user_service->get_friends_of($friends_of_main_user);

        return Inertia::render('FriendsOfFriend', [
            'user' => $user,
            'friend' => $friend,
            'friends_of_friend' => $friends_of_friend,
        ]);
    }
}
