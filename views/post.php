<?php
    $postID = $_GET['postID'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $publicationDate = $_REQUEST['publicationDate'];
    $userID = $_REQUEST['userID'];
?>

<!-- Single Post Content -->
<div class="container mt-4">
    <div class="card">
      
        <div class="card-body">
              <!-- Smaller Image, Left Justified -->
        <img src="https://via.placeholder.com/400x200" class="card-img-top float-start me-3" alt="Post Image" style="width: 200px;">

            <h2 class="card-title"><?php echo $title ?></h2>
            <input type="hidden" name="postID" id="postID" value=<?php echo $postID?>>
            <input type="hidden" name="userID" id="userID" value=<?php echo $userID?>>
            <p class="card-text"><?php echo $content ?></p>

            <?php
                if(isset($_SESSION['userID'])){
                    if($_SESSION['userID']==$userID || $_SESSION['role'] == "admin"){
                        echo '<form action="controller.php" method="POST">';
                        $_SESSION['postID']=$postID;
                        echo '<input type="hidden" name="page" value="update">';
                        echo '<input type="hidden" name="postID" value=" . htmlspecialchars($postID) . ">';
                        echo '<a href="controller.php?page=updatepost" class="btn btn-primary">Update</a>';
                        echo '</form>';
                    }
                }
            ?>
        </div>
    </div>

 
    </div>
</div>