<?php include "inc/header.php";?>

<h2 class="page-header">Edit Job Listing</h2>
<form method="post" action="edit.php">
    <div class="form-group">
    <label>Company</label> 
    <input type="text" name="company" class="form-control" value="<?php echo $job->company;?>">       
</div>

<div class="form-group">
    <label>Category</label> 
    <select name="categories" class="form-control" >
  <option value="0"> Select a category</option>
  <?php foreach($cat as $cats): ?>

  <?php if($job->catID == $cats->catID) : ?>

    <option value="<?php echo $cats->catID; ?>" selected><?php echo $cats->name; ?> </option>

  <?php else : ?>

  <option value="<?php echo $cats->catID; ?>"><?php echo $cats->name; ?> </option>

  <?php endif; ?>

  
  
  <?php endforeach; ?> 
  </select>
           
</div>

<div class="form-group">
    <label>Job Title</label> 
    <input type="text" name="jobtitle" class="form-control" value="<?php echo $job->jobtitle;?>">     
    <input type="text" name="jobID" class="form-control" value="<?php echo $job->jobID;?>">      
</div>

<div class="form-group">
    <label>Description</label> 
    <textarea name="description" class="form-control"> <?php echo $job->description;?> </textarea>      
</div>

<div class="form-group">
    <label>Country</label> 
    <textarea name="country" class="form-control"> <?php echo $job->country;?> </textarea>      
</div>

<div class="form-group">
    <label>Location</label> 
    <input type="text" name="location" class="form-control" value="<?php echo $job->location;?>">       
</div>

<div class="form-group">
    <label>Salary</label> 
    <input type="text" name="salary" class="form-control" value="<?php echo $job->salary;?>">       
</div>

<div class="form-group">
    <label>Contact User</label> 
    <input type="text" name="contactuser" class="form-control" value="<?php echo $job->contactuser;?>">       
</div>

<div class="form-group">
    <label>Contact Email</label> 
    <input type="email" name="contactemail" class="form-control" value="<?php echo $job->contactemail;?>">       
</div>
<input type="submit" class="btn btn-success" name="submit" value="Submit" >

</form>
  </br />

<?php include "inc/footer.php";?>