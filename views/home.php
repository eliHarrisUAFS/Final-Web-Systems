<?php
    $posts = $_REQUEST['posts'];
?>
<!-- Featured Post -->
<div class="container mt-4">
    <div class="card mb-4">
        <img src="https://via.placeholder.com/1200x600" class="card-img-top" alt="Featured Image">
        <div class="card-body">
            <?php
            echo '<h5 class="card-title">' . htmlspecialchars($posts[0]->title) . '</h5>';
            echo '<p class="card-text">' . substr(htmlspecialchars($posts[0]->content), 0, 20) .'...</p>';
            echo '<form action="controller.php" method="GET">';
            echo '<input type="hidden" name="page" value="post">';
            echo '<input type="hidden" name="postID" value="' . htmlspecialchars($posts[0]->postID) . '">';
            echo '<input type="submit" class="btn btn-primary" value="Read More">';
            echo '</form>';
            ?>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-4">


        <?php
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == "author" || $_SESSION['role'] == "admin"){
                echo '<div class="row">';
                echo '<h3>Add Post</h3>';
                echo '<a class="btn btn-primary" href="controller.php?page=newpost">Add Post</a>';
                echo '</div>';
            }
        }

        ?>


    <h3>Recent Posts</h3>

    <div class="row">
        <?php
            foreach ($posts as $post) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Sample Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($post->title) . '</h5>';
                echo '<p class="card-text">' . substr(htmlspecialchars($post->content), 0, 20) .'...</p>';
                echo '<form action="controller.php" method="GET">';
                echo '<input type="hidden" name="page" value="post">';
                echo '<input type="hidden" name="postID" value="' . htmlspecialchars($post->postID) . '">';
                echo '<input type="submit" class="btn btn-primary" value="Read More">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>
