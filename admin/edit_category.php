<?php include 'includes/header.php'?>
<?php
  $id = $_GET['id'];
  $db = new Database();

  $query = "SELECT * FROM `categories` WHERE id ='$id'";
  $result = $db->select($query);
  $row = $result->fetch_assoc();
//Update Category
  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    if ($name == '') {
      echo "Please Fill in a Category Name";
    } else {
      $query1 = "UPDATE `categories` SET `name` = '$name' WHERE `categories`.`id` = '$id' ";
      $update_row = $db->update($query1);
    }
  }
  //Delete Category
  if (isset($_POST['delete'])) {
    $query = "DELETE FROM `categories` WHERE `id`='$id'";
    $delete_row = $db->delete($query);
  }
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Edit Category</label>
        <input type="text" name="name" class="form-control" value="<?php
            echo $row['name']; ?>" >
    </div>
    <div>
        <input name = "submit" type="submit" class = "btn btn-default" value="Submit" />
        <a class="btn btn-inverse" href="index.php">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
    </div>
    <br>
</form>

<?php  include 'includes/footer.php'?>
