<?php 
    require_once 'functions.php';
    require_once 'send_code.php';
    //for mananging signup
    
    if(isset($_GET['signup'])){
        $response = validateSignupForm($_POST);
        if($response['status']){
            if(createUser($_POST)){
                header('location:../../?login&newUser');
            }
            else{
                echo "<script> alert('something went wrong') </script>";
            }
        }
        else{
            $_SESSION['error'] = $response;
            $_SESSION['formdata'] = $_POST;
            header("location:../../?signup"); 
        }

    } 


//for mananging login
if(isset($_GET['login'])){

    $response = validateLoginForm($_POST);
    
    if($response['status']){
       $_SESSION['Auth'] = true; 
       $_SESSION['userdata'] = $response['user'];
 
        if($response ['user']['ac_status'] == 0){
            $code = rand (1000,9999);
            $_SESSION['code'] = $code; 
        
            sendCode($response['user']['email'], 'Verify Your Email', $code);

        }
            
       header("location:../../");

    }

    else{
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        header("location:../../?login"); 
    }

}

if (isset($_GET['resend_code'])){
    $code = rand (1111 ,9999 );
    $_SESSION['code'] = $code;
    
    sendCode($_SESSION['userdata']['email'], 'Verify Your Email',$code);
    header('location:../../?re-sent');
    }


if (isset($_GET['verify_email'])){
    $user_code = $_POST['usercode'];
    $code = $_SESSION['code'];
    if( $code == $user_code){
        if(verifyEmail($_SESSION['userdata']['email'])){
        header('location:../../');
        }
        else{
            echo "Somthing sent wrong !";
        }
    } 
      
    else{
        $response ['msg']='Incorrect verification code ! ';

        if(!$_POST['usercode']){
            $response ['msg']='Please enter verification code ! ';  
        }
        $response ['field']='usercode';
        $_SESSION['error']=$response;
        header('location:../../');
    }
}

if(isset($_GET['update_profile'])){
    $response=validateUpdateForm ($_POST, $_FILES['dp']);
    if($response['status']){
        if(updateProfile($_POST, $_FILES['dp']))
        {
            header("location:../../");
        }else{
            echo "something went wrong !";
        }
    }
    else{
        $_SESSION['error'] = $response;
        header("location: ../../?edit_profile");
    }
}

//for logout
if(isset($_GET['logout'])){
    session_destroy();
    header('location:../../');
}


//for managing Add Post

if(isset($_GET['add_post'])){
    $response = validatePostImage($_FILES['post_img']);
    if($response['status']){
        if(addPost($_POST, $_FILES['post_img'])){
            header("location:../../");
        }
        else
        {
            echo "something went wrong";
        }
    }
    else{
        $_SESSION['error'] = $response;
        header("location: ../../");
    }

}