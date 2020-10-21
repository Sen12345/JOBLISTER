<?php include "inc/header.php";?>


<div class="jumbotron">
        <h1>Find A JOB</h1>
  <form method="GET" action="index.php">
  <select name="cat" class="form-control">
  <option value="0"> Select a category</option>
  <?php foreach($cat as $cats): ?>
  
  <option value="<?php echo $cats->catID; ?>"><?php echo $cats->name; ?> </option>
  
  <?php endforeach; ?> 
  </select>
  <br />
  <input type="submit" class="btn btn-lg btn-success" value="Find">
</form>
    </div>

    <h3><?php echo $title;?> </h3>
    <?php  foreach($jobs as $job): ?>
      <div class="row marketing">
      
        <div class="col-md-10">
          <h4><?php echo $job->jobtitle; ?></h4>
          <p><?php echo  $job->description; ?></p>
          </div>

        <div class="col-md-2">
        <a class="btn btn-default" href="job.php?id=<?php echo $job->jobID;?>">View</a>
        </div>

        </div>
    <?php endforeach; ?>

        
    </div> <!-- /container -->              

<?php include "inc/footer.php";?>