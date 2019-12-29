<?php
include "config.php";
class user{

    private $user_id,$name,$address,$email,$password;
    private $config;

    public function __construct()
    {
        $this->config = new config();
    }

    public function getConfig()
    {
        return $this->config;
    }
    public function setConfig($config)
    {
        $this->config = $config;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function user_create()
    {
        $name = $this->getName();
        $address = $this->getAddress();
        $email = $this->getEmail();
        $password = $this->getPassword();

        $check_email_sql = "select * from user where email='$email'";

        if ($this->config->checkRows($check_email_sql) > 0) {
            return false;
        } else {
            $user_create_sql = "insert into user(name,address,email,password) values('$name','$address','$email','$password')";
            $this->config->CUD($user_create_sql);
            return true;
        }

    }

    public function user_login()
    {
        $email = $this->getEmail();
        $password = $this->getPassword();

        if($email=='admin@gmail.com' && $password=='admin'){
            $_SESSION['user_id']='Admin';
            echo "<script type='text/javascript'>  window.location='admin-home.php'; </script>";
        }else{
            $check_email_sql = "select * from user where email='$email'";
            if(!$this->config->checkRows($check_email_sql)){
                return "email-not-exists";
            }else{
                $user_data = $this->config->select($check_email_sql);
                foreach ($user_data as $userDataRow){
                    $fetchUserPassword = $userDataRow["password"];
                    if($fetchUserPassword==$password){
                        $_SESSION['user_id']=$userDataRow['user_id'];
                        $_SESSION['name']=$userDataRow['name'];
                        echo "<script type='text/javascript'>  window.location='dashboard.php'; </script>";
                    }else{
                        return "password-not-match";
                    }
                }
            }
        }

    }


}