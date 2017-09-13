<?php

class UserController
{
    public function login()
    {
        // Call the user model to get the user info from the form
        $login_info = UserModel::getLoginInfo();

        if (!empty($login_info)) {
            session_start();
            $_SESSION["user"] = $login_info;
            UserModel::setUserStatus(1, $_SESSION["user"]);
            header("location:index.php");
        } else {
            header("location:index.php");
        }
    }

    public function logout()
    {
        session_start();
        UserModel::setUserStatus(0, $_SESSION["user"]);
        session_unset();
        session_destroy();
        header("location:index.php");
    }

    public function register()
    {
        $register_info = UserModel::addNewUser();

        if (!empty($register_info)) {
            session_start();
            $_SESSION["user"] = $register_info;
            UserModel::setUserStatus(1, $_SESSION["user"]);
            header("location:index.php");
        } else {
            header("location:index.php");
        }
    }

    public function edit()
    {
        $edit_info = UserModel::editUser();

        if (!empty($edit_info)) {
            $_SESSION["user"] = $edit_info;
            header("location:index.php?c=cover&a=profile&user=". $edit_info->id);
        } else {
            header("location:index.php?c=cover&a=profile&user=". $edit_info->id);
        }
    }
}

?>