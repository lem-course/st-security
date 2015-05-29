<?php

require_once("model/UserDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");

class UserController {

    public static function showLoginFormInsecure() {
        ViewHelper::render("view/user-login-form.php", ["formAction" => "login-insecure"]);
    }

    public static function loginInsecure() {
        $user = UserDB::getUserInsecure($_POST["username"], $_POST["password"]);
      
        if ($user) {
            User::login($user);

            $vars = [
                "username" => htmlspecialchars($_POST["username"]),
                "password" => htmlspecialchars($_POST["password"])
            ];

            ViewHelper::render("view/user-login-success.php", $vars);
        } else {
            ViewHelper::render("view/user-login-form.php", 
                ["errorMessage" => "Invalid username or password."]);
        }
    }

    public static function showLoginForm() {
        ViewHelper::render("view/user-login-form.php", ["formAction" => "login"]);
    }

    public static function login() {
        $user = UserDB::getUser($_POST["username"], $_POST["password"]);

        if ($user) {
            User::login($user);

            $vars = [
                "username" => htmlspecialchars($_POST["username"]),
                "password" => htmlspecialchars($_POST["password"])
            ];

            ViewHelper::render("view/user-login-success.php", $vars);
        } else {
            ViewHelper::render("view/user-login-form.php", 
                ["errorMessage" => "Invalid username or password."]);
        }
    }

    public static function logout() {
        User::logout();

        ViewHelper::redirect("joke");
    }
}