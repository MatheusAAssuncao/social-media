<?php

namespace App\Services;

use App\Models\UserConnection;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $_id_user;

    function __construct($id_user)
    {
        $this->_id_user = $id_user;
    }

    public function get_friends_of(array $not_in = []) : array
    {
        $result = UserConnection::join('users', 'users.id', '=', 'user_connections.friend_id')
            ->select('users.id', 'users.firstName', 'users.surname', 'users.age', 'users.gender')
            ->where('user_connections.user_id', '=', $this->_id_user);
        
        if (!empty($not_in)) {
            $result = $result->whereNotIn('user_connections.friend_id', $not_in);
        }

        return $result->getQuery()->get()->toArray();
    }

    public function get_sugested_friends() : array
    {
        $sql = "SELECT user_connections.user_id as id, users.firstName, users.surname, users.gender, users.age
            FROM user_connections 
            INNER JOIN users ON users.id = user_connections.user_id
            WHERE user_connections.user_id <> :id_user1
            AND user_connections.friend_id in (SELECT friend_id FROM user_connections WHERE user_id = :id_user2)
            AND user_connections.user_id not in (SELECT friend_id FROM user_connections WHERE user_id = :id_user3)
            GROUP BY user_connections.user_id, users.firstName, users.surname, users.gender, users.age 
            HAVING COUNT(user_connections.friend_id) >= 2";
         
        return DB::select($sql, 
            [
                'id_user1' => $this->_id_user,
                'id_user2' => $this->_id_user,
                'id_user3' => $this->_id_user
            ]);
    }
}
