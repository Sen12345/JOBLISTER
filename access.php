<?php
session_start();
function amin(){
if(isset($_POST['submit'])  AND  $_POST['submit'] == "Login"){
if(!isset($_POST['email']) OR $_POST['email'] == "" OR !isset($_POST['password']) OR $_POST['password'] == ""){
   $GLOBALS['error'] = "<div class='alert alert-warning'>Please fill in the blank spaces</div>";
   return FALSE;
} 

$set_cookie = new dbquery1();
$get_cookie = $set_cookie->getSingleEmail($_POST['email']);
if(isset($_POST['remember'])){
    setcookie("email", $_POST['email'], time()+(86400*30));
    setcookie("password", $_POST['password'], time()+(86400*30));
}

if(repertoireContains($_POST['email'], $_POST['password'])){
    $check_user = new dbquery1();
    $check_email = $check_user->getSingleEmail($_POST['email']);
    //header('Cache-Control: no cache'); //no cache
   // session_cache_limiter('private_no_expire'); // works
    //session_cache_limiter('public'); // works too
    
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['ID'] = $check_email->registerID;
    $_SESSION['repID'] = $check_email->repID;
    $_SESSION['loggedIn'] = TRUE;
    setcookie("loggedIn", $_SESSION['loggedIn'], time()+600);
    return TRUE;
  
} else {
    return false;
    session_unset();
}

}

if(isset($_GET['logout'])){
    session_unset();
   header("Location: .. ");
}

if(isset($_SESSION['loggedIn'])){
    return repertoireContains($_SESSION['email'], $_SESSION['password']);
}
    
}   



function repertoireContains($email, $password){
    $check_user = new dbquery1();
    $check_email = $check_user->getSingleEmail($email);
    $check_pass = $check_user->getSinglePass($_POST['password'], $email);
   
 if( $check_email AND $check_pass AND $check_email->email == $email AND $check_pass == $password){
    return TRUE;
    $GLOBALS['error'] = "";
} else {
    $GLOBALS['error'] = "<div class='alert alert-warning'>Email or password does not match those stored on our database</div>";
    include_once "../login.php";
    exit();

}

if(isset($_GET['request'])){
    header("Location: . ");
    
  }


  

}
