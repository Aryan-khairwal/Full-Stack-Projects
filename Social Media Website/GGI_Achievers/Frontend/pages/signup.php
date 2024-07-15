 
 <div class="login">
        <div class="col-8 bg-white border rounded p-4 shadow-sm">
            
            <form action="Backend/php/action.php?signup" method="post">
                <div class="d-flex justify-content-center  ">

                    <img class="mb-sm-1" src="Frontend/img/ggilogo.jpg" alt="" height="120">
                </div>
                <h1 class="h5 mb-3 fw-normal">Create new account</h1>
                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input type="text" class="form-control rounded-0"  name="first_name" value="<?=showFromData('first_name')?>">
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mt-1 col-6">
                        <input type="text" class="form-control rounded-0" placeholder=" " name="last_name" value="<?=showFromData('last_name')?>" >
                        <label for="floatingInput">Last Name</label>
                    </div>
                </div>
                 
                <?=showError('first_name')?>
                
                <div class="d-flex gap-3 my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                            value="male" checked>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                            value="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other"
                            value="other">
                        <label class="form-check-label" for="other">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-floating mt-1">
                    <input type="email" class="form-control rounded-0" placeholder=" " name="email" value="<?=showFromData('email')?>"> 
                    <label for="floatingInput">GGI Email</label>
                </div>
                <?=showError('email')?>

                <div class="form-floating mt-1">
                    <input type="number" class="form-control rounded-0" placeholder=" " name="roll_no"  value="<?=showFromData('roll_no')?>">
                    <label for="floatingInput">Roll Number</label>
                </div>
                <?=showError('roll_no')?>

                <div class="form-floating mt-1">
                    <input type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <?=showError('password')?>

                
                <!-- <div class="form-floating mt-1">
                    <input type="password" class="form-control rounded-0" id="floatingPassword" placeholder="Confirm Password">
                    <label for="floatingPassword">Confirm Password</label>
                </div> -->

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                    <a href="?login" class="text-decoration-none">Already have an account ?</a>


                </div>

            </form>
        </div>
    </div>

