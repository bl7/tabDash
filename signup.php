<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Sign up
    </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
  

</head>

<body >
<div >
			
				<?php include 'navbar.php';?>
	
            <form class="form-signin container col-lg-4" method="post">

    <?php
    include "class/user.php";
    include "class/message.php";
    $user = new user();
    if(isset($_POST['signup_btn'])){

        if($_POST['name']=="" || $_POST['address']=="" || $_POST['email']=="" || $_POST['password']==""){
            danger_message('Sorry','Fill up all the fields.');
        }else{
            $user->setName($_POST['name']);
            $user->setAddress($_POST['address']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            if($user->user_create()){
                success_message('Congratulations','Successfully registered.');
            }else{
                danger_message('Sorry','Email already exists. Try again!');
            }
        }
    }
    ?>


    <h2 class="h4 mb-4 font-weight-normal text-center">Create new admin</h2>
    <input type="text" class="form-control" placeholder="Name" name="name" autofocus>
    <input type="text" class="form-control" placeholder="Address" name="address">
    <input type="email" class="form-control" placeholder="Email Address" name="email">
    <input type="password" class="form-control" placeholder="Password" name="password">
    <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="signup_btn">Add</button>


</form>
		</div>


<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-3.3.1.slim.min.js"><\/script>')</script>
<script src="assets/js/bootstrap.bundle.min.js"></script>


</body>
</html>

