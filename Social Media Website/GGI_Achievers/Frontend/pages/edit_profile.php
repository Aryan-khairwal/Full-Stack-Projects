        <?php
        global $user; ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-white border">
        <div class="container col-9 d-flex justify-content-between">
            <div class="d-flex justify-content-between col-8">
                <a class="navbar-brand" href="?">
                    <img src="Frontend/img/ggilogo1.jpg" alt="" height="60">

                </a>

                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder=""
                        aria-label="Search">

                </form> -->

            </div>

 

            <ul class="navbar-nav  mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link text-dark" href="?"><i class="bi bi-house-door-fill"></i></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="menu"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Frontend/img/profile/<?=$user['dp']?> " alt="" height="30" class="rounded-circle border">
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
    <div class="container col-9 rounded-0 d-flex justify-content-between">
        <div class="col-12 bg-white border rounded p-4 mt-4 shadow-sm">
            
            <form method="post" action="Backend/php/action.php?update_profile " enctype="multipart/form-data" >
                <div class="d-flex justify-content-center">


                </div>
                <h1 class="h5 mb-3 fw-normal">Edit Profile</h1>
                <div class="form-floating mt-1 col-6">
                    <img src="Frontend/img/profile/<?=$user['dp']?> " class="img-thumbnail my-3" style="height:150px;" alt="...">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Change Profile Picture</label>
                        <input class="form-control" type="file" name="dp">
                    </div>

                    <?=showError('dp')?>
                </div>

                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input type="text" class="form-control rounded-0"  value="<?=$user['first_name']?>" disabled>
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mt-1 col-6">
                        <input type="text" class="form-control rounded-0" value="<?=$user['last_name']?>" disabled>
                        <label for="floatingInput">Last Name</label>
                    </div>
                </div>
                
                
               
                
                <div class="form-floating mt-1">
                    <input type="email" class="form-control rounded-0" id="floatingPassword" value="<?=$user['email']?>" disabled>
                    <label for="floatingPassword">Email</label>
                </div>
                 
                <div class="form-floating mt-1">
                    <input type="text" class="form-control rounded-0"  name="department" value="<?=$user['department']?>" >
                    <label for="floatingInput">Department</label>
                </div>
            

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Update Profile</button>



                </div>

            </form>
        </div>

</div>