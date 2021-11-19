<?php include "inc/header.php";?>
<h2><?php echo $job->jobtitle; ?></h2> (<?php echo $job->location; ?>)

<small>Posted by <?php  echo $job->contactuser; ?> on <?php echo $job->post_date;?></small>
<hr>
<p class="leed"> <?php echo $job->company;?></p>
<ul class="list-group">
    <li class="list-group-item"><strong><?php echo $job->description;?></strong> </li>
    <li class="list-group-item"><strong><?php echo $job->salary;?></strong>  </li>
    <li class="list-group-item"><strong><?php echo $job->contactemail;?></strong> </li>
</ul>

<a href="index.php">Go back</a>
<br />
<br />
<div class="well">
<a href="edit.php?id=<?php echo $job->jobID;?>&loc=<?php echo $job->location;?>" class="btn btn-success">Edit</a>
<form style="display:inline" method="post" action="job.php">
<input type="hidden" name="del_id" value="<?php echo $job->jobID;?>">
<input type="submit" class="btn btn-danger" value="Delete">

</form>
</div>

<?php include "inc/footer.php";?>