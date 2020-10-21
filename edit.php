<?php include_once 'config/init.php';?>

<?php
$job = new Job;

$job_id = isset($_GET['id']) ? $_GET['id'] : null;

if(isset($_POST['submit'])){

    $data = array();
    $data["catID"] = $_POST["categories"];
    $data["jobtitle"] = $_POST["jobtitle"];
    $data["company"] = $_POST["company"];
    $data["description"] = $_POST["description"];
    $data["location"] = $_POST["location"];
    $data["salary"] = $_POST["salary"];
    $data["contactuser"] = $_POST["contactuser"];
    $data["contactemail"] = $_POST["contactemail"];
    

if($job->update($job_id, $data)){

    redirect("index.php","Your job has been edited","Success");

} else {

    redirect("index.php","Something went wrong","error");

}

}

$template = new Template("templates/job-edit.php");

$template->job   = $job->getJobs($job_id);

$template->cat   = $job->getCategories();

echo $template;

?>