<?php
    $postID = $_SESSION['postID'];
    $userDAO = new UserDAO();
    $post = $userDAO->getPost($postID);
    $title = $post->title;
    $content = $post->content;
?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">New Post</h5>
                    <form action="controller.php" method="POST">
                        <input type="hidden" name="page" value="updatepost">
                        <input type="hidden" name="postID" value=<?php echo $postID?>>
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