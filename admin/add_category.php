<?php include 'includes/header.php';?>

<?php
  $db = new Database();
  if(isset($_POST['submit'])){
  	$name = mysqli_real_escape_string($db->link,$_POST['name']);
  	if ($name == '') {
  		echo "Please enter a Category Name";
  	} else {
  	  $query = "INSERT INTO `categories`(name) VALUE ('$name')";
  	  $insert_row = $db->insert($query);
  	}
  	
  }
?>
 <form role="form" method="post" action="add_category.php">
     <div class="form-group">
         <label>Add Category</label>
         <input type="text" name="name" class="form-control" placeholder="Enter Name of Category" >
     </div>
     <div>
         <input name = "submit" type="submit" class = "btn btn-default" value="Submit" />
         <a class="btn btn-inverse" href="index.php">Cancel</a>
     </div>
     <br>
 </form>

<?php  include 'includes/footer.php'?>
