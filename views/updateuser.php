<?php
    $userID = $_GET['userID'];
    $userDAO = new UserDAO();
    $user = $userDAO->getUser($userID);
    $lastname = $user->getLastname();
    $firstname = $user->getFirstname();
    $username = $user->getUsername();
    $email = $user->getEmail();
    $passwd = $user->getPasswd();
    $urole = $user->getUrole();

?>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User List <?php echo $userID?></h5>
                        <p class="card-text">Add a new user to the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="update">
                            <input type="hidden" name="userID" value="<?php echo $userID?>">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-3" id="lastname" name="lastname" value="<?php echo $lastname?>" required>
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-3" id="firstname" name="firstname" value="<?php echo $firstname?>" required>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" value="<?php echo $username?>" required>
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" value="<?php echo $email?>" required>
                            <label for="passwd" class="form-label">Password</label>
                            <input type="text" class="form-control mb-3" id="passwd" name="passwd" value="<?php echo $passwd?>" required>
                            <label for="urole" class="form-label">Role</label>

                            <select class="form-select mb-3" name="urole">
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                <option value="Author">Author</option>
                                <option selected value="<?php echo $urole?>"><?php echo $urole?></option>
                            </select>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
