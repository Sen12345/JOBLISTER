<?php include_once 'config/init.php';?>

<?php

$job = new Job;

if(isset($_POST['del_id'])){

    $del_id = $_POST['del_id'];

    if($job->delete($del_id)){

        redirect("index.php","Job deleted","Success");

    } else {

        redirect("index.php","Job  not deleted","error");

    }      

}

$template = new Template("templates/job-single.php");

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

if($job_id){
$template->job  = $job->getJobs($job_id);
}else{$job_id = "";}

echo $template;

?>