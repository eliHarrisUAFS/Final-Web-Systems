 <?php 
    $userID = $_GET['userID'];
    if($userID!=null){
        $userDAO = new UserDAO();
        $user = $userDAO->getUser($userID);
    }else{
        $user = new User();
    }
   
 ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User List</h5>
                        <p class="card-text">Add a new user to the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="update">
                            <input type="hidden" name="userID" value="<?php echo $user->getPostID(); ?>">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-3" id="lastname" name="lastname" placeholder="Enter Last Name" 
                                value="<?php echo $user->getLastname(); ?>" required>
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-3" id="firstname" name="firstname" placeholder="Enter First Name"
                                value="<?php echo $user->getFirstname(); ?>" required>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Username"
                                   value="<?php echo $user->getTitle(); ?>" required>
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your Email Address"
                                   value="<?php echo $user->getContent(); ?>" required>
                            <label for="passwd" class="form-label">Password</label>
                            <input type="text" class="form-control mb-3" id="passwd" name="passwd" placeholder="Enter your Password"
                                value="<?php echo $user->getPasswd(); ?>" required>
                            <label for="urole" class="form-label">Role</label>
                            <select class="form-select mb-3" name="urole">
                                <option value="Admin">Admin</option>
                                <option value="Author">Author</option>
                                <option selected value="User">User</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
