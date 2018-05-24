<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?> | MADDAFACCARS</title>
    <link href="hat.ico" rel="icon">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Ping Pong's MADDAFACCARS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/review">Reviews</a></li>
            <li><a href="/user">Users</a></li>
            <li><a href="/review/review">Create review</a></li>
              <?php
              if(!isset($_SESSION['username']))
              {
                echo '<li><a href="/user/create">Create user</a></li>';
                echo '<li><a href="/user/login">Login</a>';
              }
              else
              {
                echo '<li><a href="/user/doLogout">Logout</a>';
              }
              ?>
          </ul>
        </div><!--/.nav-collapse -->

        
    <!--<label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="passwort" required>

    <button type="submit">Login</button>
  -->
   <!-- <form action = "" method = "post"> 
      <div class="sepp">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/>
                  <label>Password  :</label><input  type = "password" name = "password" class = "box" />
                  <input  type = "submit" value = " Submit "/>
                </div>
              </form> -->







    </nav>

    <div class="container">

    <h1 class="heading"><?= $heading ?></h1>
