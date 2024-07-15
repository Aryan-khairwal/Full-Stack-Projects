 <?php
    global $user;
    global $posts;
    ?>

 <nav class="navbar navbar-expand-lg navbar-light bg-white border">
     <div class="container col-9 d-flex justify-content-between">
         <div class="d-flex justify-content-between col-8">
             <a class="navbar-brand" href="?">
                 <img src="Frontend/img/ggilogo1.jpg" alt="" height="60">

             </a>
         </div>



         <ul class="navbar-nav  mb-2 mb-lg-0 ">

             <li class="nav-item">
                 <a class="nav-link text-dark"  data-bs-toggle="modal" data-bs-target ="#add_post" href="#"><i class="bi bi-plus-square-fill"></i></a>
             </li>

             <li class="nav-item">
                 <a class="nav-link text-dark" href="?"><i class="bi bi-house-door-fill"></i></a>
             </li>

             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" id="navbarDropdown" role="menu" data-bs-toggle="dropdown" aria-expanded="false">
                     <img src="Frontend/img/profile/<?= $user['dp'] ?>" alt="" height="30" class="rounded-circle border">
                 </a>

                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="?edit_profile">Edit Profile</a></li>
                     <li><a class="dropdown-item">Account Settings</a></li>
                     <li>
                         <hr class="dropdown-divider">

                     </li>
                     <li><a class="dropdown-item" href="Backend/php/action.php?logout">Logout</a></li>
                 </ul>
             </li>

         </ul>


     </div>
 </nav>

<!-- // POSTS -->

 <div class="container col-12 rounded-0 d-flex justify-content-center ">

      <div class="col-8">

        <?php 
            foreach ($posts as $post) {    
        ?>
    
    
        <div class="card mt-4">
                <div class="card-title d-flex justify-content-between  align-items-center">

                    <div class="d-flex align-items-center p-2">
                        <img src="Frontend/img/profile/<?= $post['dp']; ?>" alt="" height="30" class="rounded-circle border">&nbsp;&nbsp; <?=$post['first_name']?> <?=$post['last_name']?>

                    </div>
                    <div class="p-2">
                        <i class="bi bi-three-dots-vertical"></i>
                    </div>
                </div>
                <img src="Frontend/img/posts/<?=$post['post_img']?>" class="" alt="...">
                
                <div class="card-body">
                    <?=$post['caption']?>
                    
                    <!-- <i class="bi bi-heart" ></i> -->
                <
                <!-- <div class="input-group p-2 border-top">
                    <input type="text" class="form-control rounded-0 border-0" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary rounded-0 border-0" type="button" id="button-addon2">Post</button>
                </div> -->

        </div>

        <?php
            }?> 
            
         </div>

         <div class="col-3 mt-2 p-3">
            <div class="d-flex align-items-center p-2">
                <div><img src="Frontend/img/profile/<?= $user['dp']; ?>" alt="" height="50" class="rounded-circle border"></div>
                <div>&nbsp;&nbsp;&nbsp;</div>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h5 style="margin: 0px; text-align:left;"><?= $user['first_name']; ?> <?= $user['last_name']; ?></h5>
                    <p style="margin:0px;" class="text-muted"><?= $user['department']; ?></p>
                    <p style="margin:0px; font-size:x-small;" class="text"><?= $user['email']; ?></p>
                </div>

             </div>
        </div>
    </div>

 </div>

 
 </div>
 