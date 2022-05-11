<?php
 
 class Auth
 {
    

    public static function  checkPassword ($password)
    {
        if(!$password)
        {
            return 'Введите пароль';
        }
        if (strlen($password) < 3)
        {
            return 'Пароль должен не должен быть короче 3 символов';
        }
        return null;
    }

    public static function checkLogin ($login)
    {
        if (!$login)
        {
            return 'Введите логин';
        }

        if (strlen($login) < 5)
        {
            return 'Логин не должен быть короче 5 символов';
        }
        return null;
    }

    public static function CheckUserData($login, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users WHERE login = :login AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user)
        {
            return $user['id'];
        }
        return false;
    }

    public static function addUserIdToSession($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    

 }
