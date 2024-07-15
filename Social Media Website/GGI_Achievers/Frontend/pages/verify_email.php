 
    <div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form method="post" action="Backend/php/action.php?verify_email">
                <div class="d-flex justify-content-center">


                </div>
                <h1 class="h5 mb-3 fw-normal">Verify Your Email Id</h1>


                <p>Enter 4 Digit Code Sent to You</p>
                <div class="form-floating mt-1">

                    <input type="text" class="form-control rounded-0"  name="usercode" >
                    <label for="usercode">****</label>
                </div>
                <?php
                    if(isset($_GET['re-sent'])){
                ?>
                        <p class="text-success">Verification code re-sent !</p>
                    <?php
                    }
                    ?>

            <?=showError('usercode')?>


                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <a href="assets/php/action.php?resend_code" class="text-decoration none"> Resend Code </a>

                    <button class = "btn btn-primary" type="submit"> Verify Email</button>

                </div>
                <br>
                <a href="assets/php/action.php?logout" class="text-decoration-none mt-5"><i class="bi bi-arrow-left-circle-fill"></i>
                    Logout</a>
            </form>
        </div>
    </div>

 