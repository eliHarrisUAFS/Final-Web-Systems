<?php
    $postID = $_GET['postID'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $publicationDate = $_REQUEST['publicationDate'];
?>

<!-- Single Post Content -->
<div class="container mt-4">
    <div class="card">
      
        <div class="card-body">
              <!-- Smaller Image, Left Justified -->
        <img src="https://via.placeholder.com/400x200" class="card-img-top float-start me-3" alt="Post Image" style="width: 200px;">

            <h2 class="card-title"><?php echo $title ?></h2>
            <input type="hidden" name="postID" value=<?php echo $postID?>>
            <p class="card-text"><?php echo $content ?></p>
        </div>
    </div>

 
    </div>
</div>