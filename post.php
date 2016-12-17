<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
 <?php
   $db = new Database();
   // Select Post
    $id = $_GET['id'];
   $query = "SELECT * FROM `posts` WHERE id = '$id'";
  //run query
  $result = $db->select($query);
  //get post array
  $row = $result->fetch_assoc();
  // select categories
 $query = "SELECT * FROM `categories`";
//run query
$categories = $db->select($query);
 ?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo  formatDate($row['date']); ?>
                <a href="#"><?php echo " ".$row['author'];?></a></p>

            <p><?php echo $row['body']; ?>.</p>
            
          </div><!-- /.blog-post -->

<?php include 'includes/footer.php'; ?>