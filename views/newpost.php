<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">New Post</h5>
                    <form action="controller.php" method="POST">
                        <input type="hidden" name="page" value="newpost">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control mb-3" id="title" name="title">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control mb-3" id="content" name="content" rows="10"></textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>