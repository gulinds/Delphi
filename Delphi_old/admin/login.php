<?php include '../function.php';


if(isset($_SESSION['a_id'])){
  if (isset($_GET['url'])) {
    header("Location:".$_GET ['url']);
  }else {
    $s_id= $_GET['s_id'];
    header("Location:service.php?s_id=$s_id");
  }
}
if(isset($_POST['a_id'])){

  $a_id = trim($_POST['a_id']);
  // Check in db if adminname exist
  if (check_admin_id($_POST['a_id'])) {
    $_SESSION["a_id"] = $a_id;
    if (isset($_GET['url'])) {
      header("Location:".$_GET['url']);
    }else {
      $s_id= $_GET['s_id'];
      header("Location:service.php?s_id=$s_id");
    }
  }else {
    header("Location:login.php?s_id=$s_id&wrong=true");
  }

}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" charset="utf-8"></script>
    <script src="assets/script.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500,700,400|Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/style.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
    <?php
    include 'menu.php';
     ?>

     <div class="container">
       <div class="companyimagebackground">
              <img class="loginimage" src="assets/logo.svg" alt="" />
       </div>



         <?php if(isset($_GET['wrong'])){ echo '<div class="errorbox"><b>⚠ Incorrect!</b>  Identification was not found </div>';} ?>


          <div class="s1 companys1">
            <div class="containH">
              <h1 class="header"> <img src="assets/Admin.svg" class="icon" />Admin Login</h1>
            </div>

            <div class="inners1">
              <form action="" method="post">
                <input type="text" class="infoc row inloginhead" name="a_id" value="" placeholder="Admin ID" >
                <input class="button" type="submit" name="login_button" value="LOG IN">
              </form>

            </div>

          </div>
        </div>

  </body>
</html>
