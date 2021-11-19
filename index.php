<?php 
include("access.php");

// if(!isset($_SESSION['loggedIn']) AND !amin()){
// header("Location: ../ ");
//   exit();
// }

include_once 'config/init.php';

// if(isset($_GET['logout'])){
//     session_unset();
//    header("Location: dashboard ");
// }

$job = new Job;
$template = new Template("templates/frontpage.php");

if(!isset($_GET['cat']) && !isset($_GET['loc'])){
  $_SESSION['feedback_message'] = "";
  $template->title = "Latest Job";
  $template->jobs  =  $job->getAllJobs();
 
}elseif(isset($_GET['cat']) && $_GET['cat'] == "" && isset($_GET['loc']) && $_GET['loc'] == ""){

  $_SESSION['feedback_message'] = "<div class='alert alert-warning'>Please select a Job category and location</div>";
  $template->title = "Latest Job";
  $template->jobs  =  $job->getAllJobs();

}elseif( $template->jobs = $job->getJobsByCategory($_GET['cat'],$_GET['loc']) &&  $template->title = "Jobs in " . $job->getCategory($_GET['cat'])->name) {
  $template->jobs = $job->getJobsByCategory($_GET['cat'],$_GET['loc']);
  $template->title = "Jobs in " . $job->getCategory($_GET['cat'])->name;
 
  $_SESSION['feedback_message'] = "";
 
    $template->title = "Latest Job";
    //$template->jobs  =  $job->getAllJobs(); 
  
  }else{
    $_SESSION['feedback_message'] = "<div class='alert alert-warning'>No match found</div>";
    $template->title = "Latest Job";
  }

$template->location  = $job->getLocation();

$template->cat  = $job->getCategories();


echo $template;



?>