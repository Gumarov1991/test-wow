<?php


namespace App\Controllers;


use App\Models\Role;

class RoleController
{
    public function actionAdd()
    {
        $name = $_POST['role_name'];
        Role::add($name);

        $this->addRolesToFormSelect();

        return true;
    }

    private function addRolesToFormSelect()
    {
        $allRoles = Role::getAll();
        foreach ($allRoles as $key => $value) {
            echo "<option value='$key'>$value</option>";
        }
    }
}