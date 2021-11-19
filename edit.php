<?php
session_start();
 include_once 'config/init.php';
$job = new Job;


$job_id = isset($_GET['id']) ? $_GET['id'] : null;
$loc    = isset($_GET['loc']) ? $_GET['loc'] : null;

if(isset($_POST['submit'])){
  
    $data = array();
    $data["jobID"] = $_POST["jobID"];
    $data["jobtitle"] = $_POST["jobtitle"];
    $data["company"] = $_POST["company"];
    $data["description"] = $_POST["description"];
    $data["country"] = $_POST["country"];
    $data["location"] = $_POST["location"];
    $data["salary"] = $_POST["salary"];
    $data["contactuser"] = $_POST["contactuser"];
    $data["contactemail"] = $_POST["contactemail"];
    

if($job->update($data)){

    redirect("index.php","Your job has been edited","Success");

} else {

    redirect("index.php","Something went wrong","error");

}

}

$template = new Template("templates/job-edit.php");

$template->job   = $job->getJob($job_id,$loc);

$template->cat   = $job->getCategories();

echo $template;

?>