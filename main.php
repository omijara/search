<?php 

//Until Login User can't see this page. Session will handle this.

 session_start();
 if (!isset($_SESSION['username'])) {

    $message = "You are not logged in. Please log in first and try again";
    echo "<script>
    alert('$message');
    window.location.href = 'sign-in.php';
    </script>";
    exit;
}

require_once('database/dbcon.php');

//Join lots and user table and show the data using this sql query.

$sql = "SELECT UserID, Name, Email, LotID, Title, Description, Dey, Img_Path FROM lots  RIGHT JOIN user
   ON User.UserID = lots.LotID";

$table = mysqli_query($link, $sql);

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
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/my-style.css" rel="stylesheet">

    <title>Server-Side Programming</title>
</head>

<body role="document">

<div class="container">
      <div class="topnav">
          <a class="active" href="main.php">Home</a>
          <a href="logout.php">Logout</a>
          <div class="search-container">
            <form action="search_result.php" method="GET">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
        <div  class="row">
            <div id="title" class="col-xs-12">
                <img src="images/logo.png" width="300" height="60" alt="Salford University" />
                   <div class="pull-right"> <h1>Homepage</h1>Welcome to
                    <strong>        
                    <?php 
                    echo $_SESSION['username']; 
                    ?></strong>
                </div>
        </div>


    <div class="row">
        <div id="menu" class="col-xs-6 col-sm-3 col-md-2">
        <ul class="nav navbar_default nav-stacked">
           <!-- <a class="active" href="main.php">Home</a>
              <a href="sign-in.php">Sign in</a>
            <li><a href="#">Students</a></li>
            <li><a href="#">Students1</a></li>
            <li><a href="logout.php">Log Out</a></li> -->
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

          while ($rows = mysqli_fetch_array($table)) {

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


  <?php require('Views/template/footer.php'); ?>