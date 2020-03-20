<?php

namespace App\Models;

use App\Components\Db;

class Role
{
    public static function add($name)
    {
        $db = Db::connect();

        $query = $db->prepare("INSERT INTO user_role (rolename) VALUES (?)");
        $result = $query->execute([$name]);

        var_dump($result);
    }

    public static function getAll()
    {
        $db = Db::connect();
        $result = [];

        $query = $db->query("SELECT * FROM user_role");
        while ($row = $query->fetch()) {
            $result[$row['id']] = $row['rolename'];
        }

        return $result;
    }
}