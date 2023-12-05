<?php
$postID = $_REQUEST['postID'];
?>

<!-- Single Post Content -->
<div class="container mt-4">
    <div class="card">
      
        <div class="card-body">
              <!-- Smaller Image, Left Justified -->
        <img src="https://via.placeholder.com/400x200" class="card-img-top float-start me-3" alt="Post Image" style="width: 200px;">

            <h2 class="card-title">Single Post Title</h2>
            <input type="hidden" name="postID" value="<?php echo $_GET['postID']; ?>">
            <p class="card-text">This is the content of the single blog post. Add your detailed content here. This is a sample text that wraps around the image. You can add more content o see how it wraps. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis perferendis modi excepturi eveniet, tempora nesciunt voluptas eum officia in exercitationem error fugiat pariatur voluptatibus, velit deleniti ipsam aut tenetur cumque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aliquam non exercitationem expedita? Debitis consequatur voluptates numquam. Fuga, vero aut odio, dolor necessitatibus sint consectetur natus consequatur, omnis aperiam ducimus?</p>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis perferendis modi excepturi eveniet, tempora nesciunt voluptas eum officia in exercitationem error fugiat pariatur voluptatibus, velit deleniti ipsam aut tenetur cumque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aliquam non exercitationem expedita? Debitis consequatur voluptates numquam. Fuga, vero aut odio, dolor necessitatibus sint consectetur natus consequatur, omnis aperiam ducimus?</p>
        </div>
    </div>

 
    </div>
</div>