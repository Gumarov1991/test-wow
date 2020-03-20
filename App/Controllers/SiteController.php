<?php

namespace App\Controllers;

use App\Models\Role;
use App\Models\User;

class SiteController
{
    public function actionIndex()
    {
        $allRoles = Role::getAll();
        $allUsers = User::getAll();

        require_once 'App/views/index.php';

        return true;
    }
}