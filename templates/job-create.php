<?php include "inc/header.php";?>

<h2 class="page-header">Create Job Listing</h2>

<form method="post" action="create.php">
    <div class="form-group">
    <label>Company</label> 
    <input type="text" name="company" class="form-control">       
</div>

<div class="form-group">
    <label>Category</label> 
    <select name="categories" class="form-control" >
  <option value="0"> Select a category</option>
  <?php foreach($cat as $cats): ?>
  
  <option value="<?php echo $cats->catID; ?>"><?php echo $cats->name; ?> </option>
  
  <?php endforeach; ?> 
  </select>
           
</div>

<div class="form-group">
    <label>Job Title</label> 
    <input type="text" name="jobtitle" class="form-control">       
</div>

<div class="form-group">
    <label>Description</label> 
    <textarea name="description" class="form-control"> </textarea>      
</div>

<div class="form-group">
    <label>Country</label> 
    <textarea name="country" class="form-control"> </textarea>      
</div>


<div class="form-group">
    <label>Location</label> 
    <input type="text" name="location" class="form-control">       
</div>

<div class="form-group">
    <label>Salary</label> 
    <input type="text" name="salary" class="form-control">       
</div>

<div class="form-group">
    <label>Contact User</label> 
    <input type="text" name="contactuser" class="form-control">       
</div>

<div class="form-group">
    <label>Contact Email</label> 
    <input type="text" name="contactemail" class="form-control">       
</div>

<input type="submit" class="btn btn-success" name="submit" value="List Job" >

</form>
  </br />

<?php include "inc/footer.php";?>