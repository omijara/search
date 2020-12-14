<?php 

require_once('database/dbcon.php');
//$query = "SELECT UserID, Name, Email FROM user";
//$sql = " SELECT LotID, Title, Description, Dey, Img_Path FROM lots";

$sql = "SELECT UserID, Name, Email, LotID, Title, Description, Dey, Img_Path FROM lots  RIGHT JOIN user
   ON User.UserID = lots.LotID";

//$tuser = mysqli_query($link, $query);
$auction = mysqli_query($link, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/my-style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <title>Home | Online Auction</title>

</head>

<body role="document">

<div class="container">
          <div class="topnav">
          <a class="active" href="index.php">Home</a>
         <a href="sign-in.php">Sign in</a>
          <!--<a href="#contact">Contact</a>-->
          <div class="search-container">
            <form action="action_page.php" method="GET">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
         <div  class="row">
            <div id="title" class="col-xs-12">
                <img src="images/logo.png" width="300" height="60" alt="Salford University" />
                   <div class="pull-right"> <h1>Online Auction </h1>
                    
                </div>
        </div>


    <div class="row">
        <div id="menu" class="col-xs-6 col-sm-3 col-md-2">
        <ul class="nav navbar_default nav-stacked">
           <!--  <li><a href="index.php">Home</a></li>
           <li><a href="#">Page1</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Students1</a></li>
            <li><a href="sign-in.php">Sign In</a></li>-->
        </ul>
       </div>

    <div id="content" class="col-xs-6 col-sm-9 col-md-10">

        <table class="table table-hover">
       <thead>
        <tr>
          <th>Lots ID</th>
          <th>Title</th> 
          <th>Description</th> 
          <th>Day</th> 
          <th>Images</th> 
          <th> Auction ID</th>
          <th>Auction Name</th> 
          <th>Email</th>
        </tr>
       </thead>


        <?php 

          while ($rows = mysqli_fetch_array($auction)) {

        ?>
    <tbody>
        <td><?php echo $rows["LotID"]. "</br>"; ?></td>
        <td><?php echo $rows["Title"]. "</br>"; ?></td>
        <td><?php echo $rows["Description"]. "</br>"; ?></td>
        <td><?php echo $rows["Dey"]. "</br>"; ?></td>
        <td><a href=""><img src="<?php echo $rows["Img_Path"]; ?>" height='100' width='`150'></a></td>
        <td><?php echo $rows["UserID"]. "</br>"; ?></td>
        <td><?php echo $rows["Name"]. "</br>"; ?></td>
        <td><?php echo $rows["Email"]. "</br>"; ?></td>
      <?php } ?>
    </tbody>
  </table>


  <?php require('views/footer.php'); ?>




