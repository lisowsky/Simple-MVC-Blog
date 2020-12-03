<?php

namespace BlogMVC\Helper;

use BlogMVC\Model\User;

class Auth
{
    public static function authorize($username, $password)
    {
        $user = User::getByCredentials($username, $password);

        if ($user->id) {
            $_SESSION['user'] = $user->id;
            return true;
        }

        return false;
    }

    public static function getUser()
    {
        $id = (int) $_SESSION['user'];
        return User::getById($id);
    }

    public static function logout()
    {
        $_SESSION['user'] = null;
    }
}
