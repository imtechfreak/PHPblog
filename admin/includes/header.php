<?php include '../helpers/format_helper.php' ?>
<?php include '../lib/Database.php'; ?>
<?php include '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Dashboard</a>
            <a class="blog-nav-item" href="add_category.php">Add Category</a>
            <a class="blog-nav-item" href="add_post.php">Add Post</a>
            <a class="blog-nav-item pull-right" href="http://localhost/dashboard/blog">Visit Blog</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Admin area</h1>
    </div>

    <div class="row">

        <div class="col-sm-12 blog-main">