<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">


</head>

<body class="container">
<form class="form-signin" method="post">
    <?php   
    include "class/user.php";
    $user = new user();
    include "class/message.php";    
    if(isset($_POST['signin_btn'])){
        if($_POST['email']=="" || $_POST['password']==""){
            danger_message('Sorry','Fill up all the fields.');
        }else{
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            if($user->user_login()=="email-not-exists"){
                danger_message('Sorry','Email does not exists.');
            }elseif ($user->user_login()=="password-not-match"){
                danger_message('Sorry','Password does not match.');
            }
        }
    }
    ?>
    <h1 class="text-center">Admin Login</h1>
    <input type="email" class="form-control" placeholder="Email Address" name="email" autofocus>
    <input type="password" class="form-control" placeholder="Password" name="password">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin_btn">Sign in</button>
</form>

<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-3.3.1.slim.min.js"><\/script>')</script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>

