<?php
    $postID = $_GET['postID'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $publicationDate = $_REQUEST['publicationDate'];
    $userID = $_REQUEST['userID'];
?>

<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <input type="hidden" name="postID" value=<?php echo $postID?>>
                        <input type="hidden" name="userID" value=<?php echo $userID?>>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="update">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" id="title" name="title" value="<?php echo $title ?>" required>
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control mb-3" id="content" name="content" rows="10" required><?php echo $content ?></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
