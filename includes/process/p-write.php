<?php

if (isset($_SESSION['username'],$_SESSION['is_admin'])){
    header("Location: write.php");
}else{
    $h = new Helper();
    $msg = '';
    $post = '';
    $title = '';
    $audience = '';

    if (isset($_POST['submit'])){
        $post = $_POST['post'];
        $title = $_POST['title'];
        $audience = $_POST['audience'];

        if ($h->isEmpty(array($title, $post, $audience)))
            $msg = 'All fields are required';
        else{
            $admin = new Admin($_SESSION['username']);
            $admin->insertIntoPostDB($title, $post, $audience);
            $msg = 'Message saved successfully';
        }
    }
}

