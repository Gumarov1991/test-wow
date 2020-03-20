<?php


namespace App\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController
{
    public function actionAdd()
    {
        $name = $_POST['user_name'];
        $roleId = $_POST['user_role'];

        User::add($name, $roleId);

        $this->addUsersToTable();

        return true;
    }

    private function addUsersToTable()
    {
        $allUsers = USER::getAll();
        foreach ($allUsers as $value) {
            echo "<div class='row'>
                  <div class='col-2'>${value['id']}</div>
                  <div class='col-5'>${value['username']}</div>
                  <div class='col-5'>${value['rolename']}</div>
              </div>";
        }
    }
}