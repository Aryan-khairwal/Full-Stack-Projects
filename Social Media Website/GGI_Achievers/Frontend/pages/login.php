 
    <div class="login">
        <div class="col-8 bg-white border rounded p-4 shadow-sm">
            <form method="Post" action = "Backend/php/action.php?login">
                <div class="d-flex justify-content-center">

                    <img class="mb-4" src="Frontend/img/ggilogo.jpg" alt="" height="120">
                </div>
                <h1 class="h5 mb-3 fw-normal">Please Sign in</h1>

                <div class="form-floating   ">
                    <input type="email" class="form-control rounded-0" placeholder="College Email" name="email" value="<?=showFromData('email')?>">
                    <label for="floatingInput">GGI Email</label>
                </div>
                <?=showError('email')?>


                <div class="form-floating mt-1">
                    <input type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <?=showError('password')?>
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign in</button>
                    <a href="?signup" class="text-decoration-none">Create New Account</a>
                </div>
                <!-- <a href="#" class="text-decoration-none">Forgot password ?</a> -->
            </form>
        </div>
    </div>
 