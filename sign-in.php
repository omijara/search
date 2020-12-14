 <?php 
 session_start();
 if (isset($_SESSION['username'])) {

    $message = "You are already Logged In";
    echo "<script>
    alert('$message');
    function Redirect(){
    window.history.back()
    }
    setTimeout('Redirect()', 3000);
    </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>User Login</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="css/sleek.css" />

  

  <!-- FAVICON -->
  <link href="assets/img/favicon.png" rel="shortcut icon" />

  
  <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>

  <body class="bg-light-gray" id="body">



      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="index.php">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg>
                  <span class="brand-name">User Login</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Sign In</h4>

              <?php if (isset($_GET['msg'])) { 

              ?>
              <div style="background: #f44336;color: white;opacity: 0.80;"  id="toastmsg" class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?php echo $_GET['msg'];?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"></span>
              </button>
              </div>

            <?php } ?>
                         
            <hr>

              

              <form action="signin-check.php" method="POST" autocomplete="off">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input autocomplete="on"  required="" name="uname" type="text" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="Username or email">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input autocomplete="off" required="" name="pword" type="password" class="form-control input-lg" id="password" placeholder="Password">
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">
                       <!-- <label class="control control-checkbox">Remember me 
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label> -->
                
                      </div>
                      
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>

                    
                  </div>
                </div>
              </form>
           </div>
          </div>  
        </div>

      </div>

    </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
  $('#toastmsg').fadeOut(10000);
</script>

</body>
<style type="text/css">
  body{
    background: url(assets/img/login_page_background.jpg);
  

  }
</style>
</html>