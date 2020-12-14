<?php 

require_once('database/dbcon.php');

$search = $_GET['search'];

$msg1 = '<h4>Match found! Here is your search result.</h4>';
$msg2 = '<h4>No match found! Try again.</h4>';
  $query = "SELECT * from lots where Title like '%$search%' ";
  $result = mysqli_query($link,$query);

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
          <a class="active" href="main.php">Home</a>
          <a href="logout.php">Logout</a>
          <div class="search-container">
            <form action="action_page.php">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
         <div  class="row">
            <div id="title" class="col-xs-12">
                <img src="images/logo.png" width="300" height="60" alt="Salford University" />
                    <div class="pull-right"> <h1>Online Auction</h1>Welcome to
                    <strong>        
                    <?php 
                    echo $_SESSION['username']; 
                    ?></strong>
                </div>
                    
                </div>
        </div>


    <div class="row">
        <div id="menu" class="col-xs-6 col-sm-3 col-md-2">
        <ul class="nav navbar_default nav-stacked">
           <!-- <li><a href="main.php">Home</a></li>
            <li><a href="#">Page1</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Students1</a></li>
            <li><a href="logout.php">Logout</a></li>-->
        </ul>
       </div>

    <div id="content" class="col-xs-6 col-sm-9 col-md-10">

        <table class="table table-hover">
       <thead>
         <?php if($rows = mysqli_num_rows($result) > 0){

        echo $msg1;
                                
        while($rows = mysqli_fetch_assoc($result)){ ?>
       </thead>
    <tbody>

        <td><?php echo $rows["Title"]. "</br>"; ?></td>
        
    <?php 
      }
      }
      else{
      print ($msg2);
      }
      mysqli_free_result($result);
      mysqli_close($link);
      ?>
    </tbody>
  </table>


  <?php require('views/footer.php'); ?>




