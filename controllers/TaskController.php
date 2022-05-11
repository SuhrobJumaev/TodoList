<?php

class TaskController
{
    const  IN_PROGRESS_STATUS = 0;
    const  FINISHED_STATUS = 1;
    const TASK_EDITED_BY_ADMIN = 1;

    public function actionIndex($page, $order, $sort)
    {
       
        $tasks = array(); 
        $tasks = Task::GetTasksList($page, $order, $sort);

        
        $totalCountTasks = Task::GetTotalCountTasks();

        $pagination = new Pagination($totalCountTasks, $page, Task::SHOW_BY_DEFAULT,'page-', $order, $sort);
        
        require_once(ROOT . '/views/task/index.php');
       
        return true;
    }

   
    public function actionEditStatus($id, $page, $order, $sort)
    {
        if (Auth::isGuest()) 
        {
            header('Location: /login');
            return;
        }

        $task = Task::GetTaskById($id);

        $task['status'] = self::FINISHED_STATUS;

        Task::UpdateTaskStatus($task);
        header('Location: /task/page-' . $page . '/' .$order. '/' .$sort);
        return true;
    }

    public function actionEditText($id, $page, $order, $sort)
    {

        if (Auth::isGuest()) 
        {
            header('Location: /login');
             return;
        }

        $task = Task::GetTaskById($id);
       
        if(isset($_POST['submit']))
        {
            $text = $_POST['text'];
            
            $errors = false;
            $alert = false;

            if (Task::checkTaskText($text) != null)
            {
                $errors[] =  Task::checkTaskText($text);
            }
            
            $task['text'] = $text;
            $task['is_edit'] = self::TASK_EDITED_BY_ADMIN;

            if($errors == false)
            {
              
                $result = Task::UpdateTaskText($task);
                
                if($result)
                {
                    $alert = 'Задача успешно добавлена.';
                }

                header('Location: /task/page-' . $page . '/' .$order. '/' .$sort);
            }
            
        }

        require_once(ROOT . '/views/task/edit.php');
        return true;
    }

    public function actionCreateTask()
    {
        unset($_SESSION["PostData"]);

        if(isset($_POST['submit']))
        {
            $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
 
            $_SESSION["PostData"] = $_POST;

            $errors = false;
            $alert = false;

            if (Task::checkTaskText($text) != null)
            {
                $errors[] =  Task::checkTaskText($text);
            }

            if (Task::checkEmail($email) != null)
            {
                $errors[] =  Task::checkEmail($text);
            }
            if (Task::checkName($name) != null)
            {
                $errors[] = Task::checkName($text);
            }
            
            if($errors == false)
            {
               $id = Task::CreateNewTask($name, $email, $text,self::IN_PROGRESS_STATUS);
               if($id != 0)
               {
                    $_SESSION['alertTask'] = 'Задача успешно создана'; 
                    header('Location: /');                   
               }
            }
        }
       
        require_once(ROOT . '/views/task/create.php');
        return true;
    }
}