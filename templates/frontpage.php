<?php include "inc/header.php";?>


<div class="jumbotron">
  <div><?php if(!empty($_SESSION['feedback_message'])){echo $_SESSION['feedback_message'];} ?></div>
        <h2>Find A JOB</h2>
  <form method="GET" action="index.php">
  <select name="cat" class="form-control">
  <option value=""> Select a category</option>
  <?php foreach($cat as $cats): ?>
  
  <option value="<?php echo $cats->catID; ?>"><?php echo $cats->name; ?> </option>
  
  <?php endforeach; ?> 
  </select>
  <br />
  <select name="loc" class="form-control">
  <option value=""> Select a location</option>
  <?php foreach($location as $loc): ?>
  
  <option value="<?php echo $loc->location; ?>"><?php echo $loc->location; ?> </option>
  
  <?php endforeach; ?> 
  </select>
<br>

  <input type="submit" class="btn  btn-lg btn-success" value="Find">
</form>
    </div>

    
   <div class="container">
      <div class="row marketing">
      <h3><?php echo $title;?> </h3>
      <?php if(!empty($jobs)){ foreach($jobs as $job):  ?>
        <div class="col-xs-10">
          <h4><?php echo $job->jobtitle; ?></h4>
          <p><?php echo  $job->description; ?></p>
          </div>

        <div class=" col-xs-2">
        <a class="btn btn-default" href="job.php?id=<?php echo $job->jobID;?>&loc=<?php echo $job->location;?>">View</a>
        </div>
        <?php endforeach;} ?>   
        </div> 
    </div> <!-- /container -->       
     

<?php include "inc/footer.php";?>