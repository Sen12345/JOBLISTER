<?php include_once 'config/init.php';?>


<?php
$job = new Job;
$template = new Template("templates/frontpage.php");



$category = isset($_GET['cat']) ? $_GET['cat'] : null;

if($category){

$template->jobs = $job->getJobsByCategory($category);
$template->title = "Jobs in " . $job->getCategory($category)->name;

} else {
    $template->title = "Latest Job";
    $template->jobs  =  $job->getAllJobs();
   
}

$template->cat  = $job->getCategories();

echo $template;



?>