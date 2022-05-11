<?php

class Task
{
    const SHOW_BY_DEFAULT = 3;
    
    public static function GetTasksList($page,  $order, $sort)
    {
        $taskList = array();

        $page = intval($page);
       
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        $db = Db::getConnection();
        
        $sql = "SELECT * FROM tasks ORDER BY $order $sort LIMIT :lim  OFFSET :offset";

        $limit = self::SHOW_BY_DEFAULT;

        $result = $db->prepare($sql);
        $result->bindParam(':lim', $limit, PDO::PARAM_INT);
        $result->bindParam(":offset", $offset, PDO::PARAM_INT);
        
        $result->execute();

        $i = 0;

        while($row = $result->fetch())
        {
            $taskList[$i]["id"] = $row["id"];
            $taskList[$i]["name"] = $row["name"];
            $taskList[$i]["email"] = $row["email"];
            $taskList[$i]["text"] = $row["text"];
            $taskList[$i]["status"] = $row["status"];
            $taskList[$i]["is_edit"] = $row["is_edit"];
            $i++;
        }

        return $taskList;
    }

    public static function GetTaskById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM tasks WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function UpdateTaskStatus($task)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE tasks SET status= :status WHERE id=:id';

        $result = $db->prepare($sql);

        $result->bindParam(':status', $task['status'], PDO::PARAM_INT);
        $result->bindParam(':id', $task['id'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function UpdateTaskText($task)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE tasks SET text=:text, is_edit = :is_edit WHERE id=:id';

        $result = $db->prepare($sql);

        $result->bindParam(':text', $task['text'], PDO::PARAM_STR);
        $result->bindParam(':id', $task['id'], PDO::PARAM_INT);
        $result->bindParam(':is_edit', $task['is_edit'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function CreateNewTask($name, $email, $text, $status)
    {
        $db = Db::getConnection();
        
        $sql = "INSERT INTO tasks (name, email , text, status) VALUES(:name, :email, :text, :status)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);

        if ($result->execute()) 
        {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function GetTotalCountTasks()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT COUNT(id) as count FROM tasks");

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function checkTaskText ($text)
    {
        if(!$text)
        {
            return 'Введите текст';
        }
        return null;
    }

    public static function checkEmail($email)
    {
        if(!$email)
        {
            return 'Введите email адрес.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return 'Неправильный email адрес.';
        }
        return null;
    }

    public static function checkName($name)
    {
        if(!$name)
        {
            return 'Введите имя';
        }
        return null;
    }

    public static function IsSessionHasName()
    {
        if(isset($_SESSION['PostData']['name']))
        {
            return  $_SESSION['PostData']['name'];
        }
        return null;
       
    }

    public static function IsSessionHasText()
    {
        if(isset($_SESSION['PostData']['text']))
        {
            return  $_SESSION['PostData']['text'];
        }
        return null;
    }

    public static function IsSessionHasEmail()
    {
        if(isset($_SESSION['PostData']['email']))
        {
            return  $_SESSION['PostData']['email'];
        }
        return null;
    }

    public static function IsSessionHasAlert()
    {
        if(isset($_SESSION['alertTask']))
        {
            return  $_SESSION['alertTask'];
        }
        return null;
    }

    public static function DeleteAlertSession()
    {
        unset($_SESSION['alertTask']);
    }

}