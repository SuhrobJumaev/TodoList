<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="/template/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <title>ToDo list</title>
</head>
</header>
<nav  class="navbar navbar-light bg-light justify-content-between ml-10"  >

  <?php if (Auth::isGuest()): ?>
    <span class="navbar-text">                                        
      <li><a href="/login/"><i class="fa fa-lock"></i> Вход</a></li>
    </span> 
  <?php else: ?>
    <span class="navbar-text">  
      <li><a href="/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
      </span>   
  <?php endif; ?>
  <!-- <span class="navbar-text">
    <a class="btn btn-outline-success my-2 my-sm-0"  href="/login/">Login</a>
  </span> -->
</nav>
</header>
<body>
