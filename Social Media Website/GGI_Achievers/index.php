<?php
    require_once 'Backend/php/functions.php';
      
    
    if(isset($_SESSION['Auth'])){
        $user = getUser($_SESSION['userdata']['id']);
        $posts = getposts();
    }

    $pagecount = count($_GET);

    if(isset($_SESSION['Auth']) && $user['ac_status'] == 1  &&  !$pagecount){
        $userdata = $_SESSION['userdata'];
        showPage('header',['page_title' => 'Home']);
        showPage('home');
    
    }
    else if(isset($_SESSION['Auth']) && $user['ac_status'] == 0  &&  !$pagecount){
        $userdata = $_SESSION['userdata'];
        showPage('header',['page_title' => 'Verify Email']);
        showPage('verify_email');
    
    }
    else if(isset($_SESSION['Auth']) && $user['ac_status'] == 2  &&  !$pagecount){
        $userdata = $_SESSION['userdata'];
        showPage('header',['page_title' => 'Blocked']);
        showPage('blocked');
    
    }
    else if(isset($_SESSION['Auth']) && isset($_GET['edit_profile']) && $user['ac_status'] == 1 ){
        $userdata = $_SESSION['userdata'];
        showPage('header',['page_title' => 'Edit Profile']);
        showPage('edit_profile');
    
    }
    else if(isset($_GET['signup'])){
        showPage('header',['page_title' => 'Signup']);
        showPage('signup');
    }
    else if( isset($_GET['login']) ){
        showPage('header', ['page_title' => 'Login']);
        showPage('login');
    }
    else{
        if(isset($_SESSION['Auth']) && $user['ac_status'] == 1 ){
            showPage('header',['page_title' => 'Home']);
            showPage('home');  
        }
        else
        showPage('header', ['page_title' => 'Login']);
        showPage('login');
    }


    showPage('footer');
    unset($_SESSION['error']);
    unset($_SESSION['formdata']);
?>
 