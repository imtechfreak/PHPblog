<?php include 'includes/header.php';?>
<?php
  $db = new Database();
   //Grab Posts From DataBase
   $query = "SELECT `posts`.*, `categories`.`name` FROM `posts` 
             INNER JOIN `categories` ON `posts`.`category`=`categories`.`id`";
   $posts = $db->select($query);
  //Grab Categories From Database
   $query = "SELECT * FROM `categories`";
   $categories = $db->select($query);
?>
 <table class="table table-striped">
     <tr>
         <th>Post ID</th>
         <th>Post Title</th>
         <th>Category</th>
         <th>Author</th>
         <th>Date</th>
     </tr>
          <?php if($posts): ?>
      <tr>
          <?php while($row = $posts->fetch_assoc()) : ?>
         <td><?php echo $row['id'];?></td>
         <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
         <td><?php echo $row['category'];?></td>
         <td><?php echo $row['author'];?></td>
         <td><?php echo formatDate($row['date']);?></td>
     </tr>
        <?php endwhile; ?>
      <?php else : ?>
      <tr>
          <th>There are No Posts to show</th>
      </tr>
    <?php endif; ?>
 </table>

    <table class="table table-striped">
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
        </tr>
        <?php if ($categories) : ?>
            <?php while($row = $categories->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><a href="edit_category.php?id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></td>
        </tr>
           <?php endwhile; ?>
    <?php else : ?>
            <tr>
                <td>There are No Id</td>
                <td>There are No Name</td>
            </tr>
    <?php endif; ?>
    </table>
       

<?php include 'includes/footer.php';?>