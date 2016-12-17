<?php include 'includes/header.php';?>
<?php
  $db = new Database();
  $query = "SELECT * FROM `categories`";
  $result = $db->select($query);
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
        $query = "INSERT INTO `posts`(title,body,category,author,tags) VALUES ('$title','$body',
                                '$category','$author','$tags') ";
         $insert_row = $db->insert($query);
     }
 }
?>
<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Body of the Post"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <?php while($row = $result->fetch_assoc()): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text"  name="tags" class="form-control" placeholder="Enter Tags">
    </div>
    <div>
        <input name = "submit" type="submit" class = "btn btn-default" value="Submit" />
        <a class="btn btn-inverse" href="index.php">Cancel</a>
    </div>
    <br>
</form>


<?php include 'includes/footer.php';?>
