<?php 

class AuthController
{

    public static function actionLogin()
    {
        $login = '';
        $password = '';
        $userId = false;
      
 
        if(isset($_POST['submit']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;

            if (Auth::checkLogin($login) != null)
            {
                $errors[] = Auth::checkLogin($login);
            }

            if (Auth::checkPassword($password) != null)
            {
                $errors[] = Auth::checkPassword($password);
            }
            
            if ($errors == false)
            {
                $userId = Auth::CheckUserData($login, $password);
                if($userId != false)
                {
                    
                    Auth::addUserIdToSession($userId);
                    header('Location: /');  
                } 
                else
                {
                    $errors[] = 'Неправильные данные для для входа на сайт.'; 
                }
            }
        }

        require_once(ROOT . '/views/auth/login.php');
        return true;
    }

    public function actionLogout()
    { 

        unset($_SESSION["user"]);
        header("Location: /");
    }
}