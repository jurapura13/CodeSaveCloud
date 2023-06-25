<?php
define('URL', 'https://localhost/repositories/CodeSave/site/');
if(!$shownologin){
    //check if the website can show without login
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ".URL."login");
    }
}

$title = ($title != "") ? $title . " | CodeSave Cloud" : "CodeSave Cloud";

?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo URL; ?>assets/media/logo-small.png" type="image/x-icon">
    <link rel="preload" as="image" href="<?php echo URL; ?>assets/media/logo.png" />
    <link rel="prefetch" href="<?php echo URL; ?>assets/media/logo.png" />

    <!-- Primary Meta Tags -->
    <title><?php echo $title; ?></title>

</head>

<style>
    body {
        margin-top: 6em;
    }

    footer {
        margin-top: 2em;
        padding-top: 1em;
        padding-bottom: 1em;
    }

    .bc {
        border: var(--bs-border-width) solid var(--bs-border-color);
        background-color: rgba(var(--bs-tertiary-bg-rgb)) !important;
    }
</style>
<?php 
if($header){
    //check if to show a header and then what header to show
    session_start();
    if(isset($_SESSION["login"])){
        include "header-login.php";
    }else{
        include "header.php";
    }
}
?>