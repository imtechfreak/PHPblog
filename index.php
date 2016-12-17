<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php
$db = new Database();
//select post
$query = "SELECT * FROM `posts`";
//run query
$posts = $db->select($query);
// select categories
$query = "SELECT * FROM `categories`";
//run query
$categories = $db->select($query);
?>
<?php if ($posts) : ?>
    <?php while ($row = $posts->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?>
                <a href="#"><?php echo " " . $row['author']; ?></a>
            </p>

            <p> <?php echo shortText($row['body']); ?> </p>
            <a class="btn btn-primary" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
        </div><!-- /.blog-post -->
    <?php endwhile; ?>
<?php else : ?>
    <p> There are no posts </p>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>