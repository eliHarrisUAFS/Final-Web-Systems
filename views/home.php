<?php
    $posts = $_REQUEST['posts'];
?>
<!-- Featured Post -->
<div class="container mt-4">
    <div class="card mb-4">
        <img src="https://via.placeholder.com/1200x600" class="card-img-top" alt="Featured Image">
        <div class="card-body">
            <h2 class="card-title">Featured Post Title</h2>
            <p class="card-text">This is the featured blog post. Add your content here. It can be longer and more detailed.</p>
            <a href="controller.php?page=post" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-4">
    <h3>Recent Posts</h3>

    <div class="row">
        <?php
            foreach ($posts as $post) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Sample Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($post->getTitle()) . '</h5>';
                echo '<form action="controller.php" method="GET">';
                echo '<input type="hidden" name="page" value="post">';
                echo '<input type="hidden" name="postID" value="' . htmlspecialchars($post->getPostID()) . '">';
                echo '<input type="submit" class="btn btn-primary" value="Read More">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>
