<?php

namespace App\Models;

use App\Components\Db;

class User
{
    public static function add($name, $roleId)
    {
        $db = Db::connect();

        $query = $db->prepare("INSERT INTO user (username,role_id) VALUES (?,?)");
        $query->execute([$name, $roleId]);
    }

    public static function getAll()
    {
        $db = Db::connect();
        $result = [];

        $query = $db->query("SELECT u.id, u.username, ur.rolename 
                                        FROM user AS u
                                        LEFT JOIN user_role AS ur
                                        ON u.role_id=ur.id
                                        ORDER BY u.id");
        while ($row = $query->fetch()) {
            $result[] = $row;
        }

        return $result;
    }
}