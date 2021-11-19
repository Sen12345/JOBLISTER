<?php
session_start();
include_once 'config/init.php';

$job = new Job;

if(isset($_POST['submit']) AND $_POST['submit'] == "List Job"){

    $data = array();
    $data["catID"] = $_POST["categories"];
    $data["jobtitle"] = $_POST["jobtitle"];
    $data["company"] = $_POST["company"];
    $data["description"] = $_POST["description"];
    $data["country"] = $_POST["country"];
    $data["location"] = $_POST["location"];
    $data["salary"] = $_POST["salary"];
    $data["contactuser"] = $_POST["contactuser"];
    $data["contactemail"] = $_POST["contactemail"];
    $data['ID'] = $_SESSION['ID'];
    


if($job->create($data)){


    redirect("index.php","Your job has been listed","Success");


} else {

    redirect("index.php","Something went wrong","error");

}

}

$template = new Template("templates/job-create.php");

$template->cat   = $job->getCategories();



echo $template;

?>