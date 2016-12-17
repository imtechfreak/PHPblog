<?php include 'includes/header.php';?>
<?php
   $id = $_GET['id'];
   $db = new Database();
   //Select from posts
   $query = "SELECT * FROM `posts` WHERE id = '$id'";
   $result = $db->select($query);
   $row = $result->fetch_assoc();
  //Select from categories
  $query = "SELECT * FROM `categories`";
  $result = $db->select($query);
  //update from Categories
  if (isset($_POST['submit'])) {
     $title = mysqli_real_escape_string($db->link,$_POST['title']);
     $body = mysqli_real_escape_string($db->link,$_POST['body']);
     $category = mysqli_real_escape_string($db->link,$_POST['category']);
     $author = mysqli_real_escape_string($db->link,$_POST['author']);
     $tags = mysqli_real_escape_string($db->link,$_POST['tags']);
     if($title == '' || $body == '' || $author == ''){
        echo "please fill in the fields";
     }
     else{
        $query = "UPDATE `posts` 
                  SET 
                `title` = '$title',
                 `body` = '$body',
                `category` = '$category',
                 `author` = '$author',
                  `tags` = '$tags'
                   WHERE `id` = $id";
         $update_row = $db->update($query);
     }
 }
 //Delete post
 if (isset($_POST['delete'])) {
   $query = "DELETE FROM `posts` WHERE `id`='$id'";
   $delete_row = $db->delete($query);
 }
?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php
         echo $row['title'];?>">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Body of the Post">
            <?php echo $row['body']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <?php while($row1 = $result->fetch_assoc()): ?>
            <option value = "<?php echo $row1['id']; ?>" <?php if($row1['id']==$row['category']) echo "selected";?> >
            <?php echo $row1['name'];?>
            </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $row['author']; ?>">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text"  name="tags" class="form-control" value="<?php echo $row['tags']; ?>">
    </div>
    <div>
        <input name = "submit" type="submit" class = "btn btn-default" value="Submit" />
        <a class="btn btn-inverse" href="index.php">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
    </div>
    <br>
</form>

<?php include 'includes/footer.php';?>
