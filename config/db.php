<?php

    $conn = mysqli_connect('localhost','root','','facemask');

    session_start();

    function alert($msg)
    {
        echo "<script>alert('$msg')</script>";
    }
    
    function redirect($path = 'index.php')
    {
        echo "<script>window.open('$path' , '_self')</script>";
    }

    function checkAuth($page){
        if(!isset($_SESSION['user'])){
            redirect($page);
            return false;
        }
        return true;
    }

    function getUser() {
        if(isset($_SESSION['user'])){
            global $conn;
            $sessionData = $_SESSION['user'];
            $query = mysqli_query($conn , "select * from accounts where email = '$sessionData' or contact = '$sessionData'");
            $data = mysqli_fetch_array($query);

            return $data;
        }
        return null;
    }

    $user = getUser();

// post upload work 

    if(isset($_POST['post_upload'])){
        $userId = $user['id'];
        $caption = $_POST['post_caption'];
        $img_name = $_FILES['Photos']['name'];
        $img_tmpname = $_FILES['Photos']['tmp_name'];
        move_uploaded_file($img_tmpname ,"../assets/img_upload/post/$img_name" );
        $query = mysqli_query($conn , "INSERT INTO posts (`post_caption` ,  `image` , `post_by`) VALUE ('$caption','$img_name','$userId');");
        if($query){
            redirect('../index.php');
        }
    }

// dp work pendeing

    if(isset($_FILES['dp']['name'])){
        $userId = $user['id'];
        $img_name = $_FILES['dp']['name'];
        $img_tmpname = $_FILES['dp']['tmp_name'];
        move_uploaded_file($img_tmpname ,"../assets/img_upload/dp/$img_name" );
        $query = mysqli_query($conn , "UPDATE accounts set dp = '$img_name' where id = '$userId'");
        if($query){
            redirect('../index.php');
        }
    }

// Likes work 

    if(isset($_POST['handleLikes'])){
        $userId = $user['id'];
        $postId = $_POST['post_id'];

        $query = mysqli_query($conn , "SELECT * FROM post_likes where post_id = $postId and like_by = $userId ;");
        if(mysqli_num_rows($query) > 0){
            $query = mysqli_query($conn , "DELETE FROM `post_likes` WHERE `post_id` = '$postId' and `like_by` = '$userId';");
            if($query){
                redirect('../index.php');
            }
        }
        else{

            $query = mysqli_query($conn , "INSERT INTO `post_likes` (`post_id` , `like_by`) VALUE ('$postId','$userId');");
            if($query){
                redirect('../index.php');
            }
        }
    }

// likes count work
    
    function getLikes($postId){
        global $conn ;
        $Likes_query = mysqli_query($conn , "SELECT * FROM `post_likes` JOIN `posts` ON post_likes.post_id = posts.post_id where post_likes.post_id = $postId;");
        $count = mysqli_num_rows($Likes_query);
        return $count;
    }

// comments work

if(isset($_POST['handleComments'])){
    $userId = $user['id'];
    $postId = $_POST['post_id'];
    $comment = $_POST['post_comments'];

    $query = mysqli_query($conn , "INSERT INTO `post_comments` (`post_id` , `comment_by` , `comments`) VALUE ('$postId','$userId' , '$comment');");
    if($query){
        redirect('../index.php');
    }
}

// comment count work 

function getComments($postId){
    global $conn ;
    $Comments_query = mysqli_query($conn , "SELECT * FROM `post_comments` where post_comments.post_id = $postId;");
    $count = mysqli_num_rows($Comments_query);
    return $count;
}

// handle read_more_for comments pending 

if(isset($_POST['handle_read_more_comments'])){
    // $postId = $_POST['post_id'];
    $viewmore = true;

    if($viewmore){
        redirect('../index.php');
    }
}

?>