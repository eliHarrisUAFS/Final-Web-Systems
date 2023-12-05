<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Post</h5>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="Post">
                            <label for="Text" class="form-label">Text</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Username" required>
                            <label for="passwd" class="form-label">Password</label>
                            <input type="text" class="form-control mb-3" id="passwd" name="passwd" placeholder="Enter your Password" required>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
