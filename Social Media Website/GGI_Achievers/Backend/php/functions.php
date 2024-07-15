<?php
    require_once 'config.php';
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Database not connected");

//function to show Pages
    function showPage($page, $data = ""){
        include("Frontend/pages/$page.php");
    }


//for validating the Form data 
    function validateSignupForm($form_data){
        $response = array();
        $response['status'] = true;
        $ggi_mail = $form_data['email'];


        if (!$form_data['first_name']) {
            $response['msg'] = "Please provide first name";
            $response['status'] = false;
            $response['field'] = 'first_name';
        }

        if (!$form_data['roll_no']) {
            $response['msg'] = "Please provide roll number";
            $response['status'] = false;
            $response['field'] = 'roll_no';
        }

        if (!$form_data['email']) {
            $response['msg'] = "Please provide ggi email ";
            $response['status'] = false;
            $response['field'] = 'email';
        }

        if (!$form_data['password']) {
            $response['msg'] = "Please create a password";
            $response['status'] = false;
            $response['field'] = 'password';
        }

        if (isEmailRegistered($form_data['email'])) {
            $response['msg'] = "This email is already registered";
            $response['status'] = false;
            $response['field'] = 'email';
        }

        //checking the ggi domain in the email
        if (!str_contains($ggi_mail, 'ggi.ac.in')) {
            $response['msg'] = "Please provide ggi email";
            $response['status'] = false;
            $response['field'] = 'email';    
        }

        return $response;
    }

//for validating the Login
    function validateLoginForm($form_data){
        $response = array();
        $response['status'] = true;
        $blank = false;

        if (!$form_data['email']) {
            $response['msg'] = "Please provide ggi email ";
            $response['status'] = false;
            $response['field'] = 'email';
            $blank = true;
        }

        if (!$form_data['password']) {
            $response['msg'] = "Please enter password";
            $response['status'] = false;
            $response['field'] = 'password';
            $blank = true;
        }

        if (!$blank && !checkUser($form_data)['status']) {
            $response['msg'] = "Incorrect Password or Email";
            $response['status'] = false;
            $response['field'] = 'password';
        } 
        else{
            $response['user'] = checkUser($form_data)['user'];
        }

        return $response;

    }

//for verifying if the user exsist
    function checkUser($login_data){
        global $db;
        $email = $login_data['email'];
        $password = md5($login_data['password']);

        $query = "SELECT * FROM users WHERE (email='$email') && password='$password'";
        $run = mysqli_query($db, $query);
        $data['user'] = mysqli_fetch_assoc($run) ?? array();

        if (count($data['user']) > 0){
            $data['status'] = true;
        }
        else{
            $data['status'] = false;
        }

        return $data;

    }

//function for verifing Email
    function verifyEmail($email){
        global $db;
        $query = " UPDATE users SET ac_status = 1 WHERE email = '$email'";
        return mysqli_query($db, $query);
    }

//for getting userdata by id
    function getUser($user_id){
        global $db;
        $query = "SELECT * FROM users WHERE id=$user_id";
        $run = mysqli_query($db, $query);
        return mysqli_fetch_assoc($run);
    }

//for showing errors !
    function showError($field){
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            if (isset($error['field']) && $field == $error['field']) {
                ?>

                <div class="alert alert-danger my-2" role="alert">
                    <?= $error['msg'] ?>
                </div>

                <?php
            }
        }
    }

//function for showing previous form data
    function showFromData($field){
        if (isset($_SESSION['formdata'])) {
            $formdata = $_SESSION['formdata'];
            return $formdata[$field];

        }
    }

// for checking duplicate email
    function isEmailRegistered($email)
    {
        global $db;
        $query = "SELECT count(*) as row FROM users WHERE email = '$email' ";
        $run = mysqli_query($db, $query);
        $return_data = mysqli_fetch_assoc($run);
        return $return_data['row'];
    }

//for creating new user

    function createUser($data){
        global $db;

        $first_name = mysqli_real_escape_string($db, $data['first_name']);
        $last_name = mysqli_real_escape_string($db, $data['last_name']);
        $gender = mysqli_real_escape_string($db, $data['gender']);
        $email = mysqli_real_escape_string($db, $data['email']);
        $roll_no = mysqli_real_escape_string($db, $data['roll_no']);
        $password = mysqli_real_escape_string($db, $data['password']);
        $password = md5($password);

        $query = ' INSERT INTO users( first_name, last_name, gender, email, roll_no, password)';
        $query .= "VALUES ('$first_name', '$last_name', '$gender', '$email', '$roll_no', '$password')";
        return mysqli_query($db, $query);
    }


//for validating the update form

    function validateUpdateForm($form_data, $image_data){
        $response = array();
        $response['status'] = 'true';


        if ($image_data['name']) {
            $image = basename($image_data['name']);
            $type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $size = $image_data['size'] / 1000;

            if ($type !== "jpg" && $type !== "jpeg" && $type !== "png") {
                $response["msg"] = "Only jpg, jpeg and png images are allowed";
                $response['field'] = 'dp';
                $response['status'] = false;
            }

            if ($size > 5000) {
                $response['msg'] = "Upload image less then 5 mb";
                $response['status'] = false;
                $response['field'] = 'dp';
            }
        }


        return $response;
    }


//function for updating profile

    function updateProfile($form_data, $image_data){
        global $db;
        $department = $form_data['department'];
        $image_name = basename($image_data['name']);

        $image_dir = "../../Frontend/img/profile/$image_name";

        if ($image_data['name']) {
            $image_name = time() . basename($image_data['name']);
            $image_dir = "../../Frontend/img/profile/$image_name";
            move_uploaded_file($image_data['tmp_name'], $image_dir);
        }

        $query = "UPDATE users SET department = '$department' , dp = '$image_name' WHERE id =" . $_SESSION['userdata']['id'];
        return mysqli_query($db, $query);
    }

//for validating the update form

    function validatePostImage($image_data){
        $response = array();
        $response['status'] = 'true';

        if (!$image_data['name']) {
            $response["msg"] = "No image is selected";
            $response['field'] = 'post_img';
            $response['status'] = false;
        }

        if ($image_data['name']) {
            $image = basename($image_data['name']);
            $type = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $size = $image_data['size'] / 1000;

            if ($type !== "jpg" && $type !== "jpeg" && $type !== "png") {
                $response["msg"] = "Only jpg, jpeg and png images are allowed";
                $response['field'] = 'post_img';
                $response['status'] = false;
            }

            if ($size > 10000) {
                $response['msg'] = "Upload image less then 10 mb";
                $response['status'] = false;
                $response['field'] = 'post_img';
            }
        }


        return $response;
    }


//for Adding the Post
    function addPost($text, $image){
        global $db;
        $user_id = $_SESSION['userdata']['id'];
        $caption = mysqli_real_escape_string($db, $text['caption']);


        $image_name = time() . basename($image['name']);
        $image_dir = "../../Frontend/img/posts/$image_name";
        move_uploaded_file($image['tmp_name'], $image_dir);




        $query = " INSERT INTO posts(user_id, caption, post_img)";
        $query .= "VALUES ($user_id, '$caption', '$image_name' )";

        return mysqli_query($db, $query);
    }

//for getting posts
    function getposts(){
        global $db;
        
        $query = "SELECT posts.id, posts.post_img, posts.caption, posts.created_at, users.first_name , users.last_name, users.dp FROM posts, users WHERE users.id = posts.user_id ORDER BY  posts.id DESC";
        
        $run = mysqli_query($db, $query);
        return mysqli_fetch_all($run, true);
    }

?>