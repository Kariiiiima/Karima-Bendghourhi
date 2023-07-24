
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
  <style>


  </style>
 

	<link rel="stylesheet" href="style22.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
     <form action="login.php" method="post" class="login-box">   
     
      <div class="logo"><img src="../login/img/logo.png"></div>
           </div>
     	<h2>LOGIN TO BLOGVERSE</h2>
    
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
       <i class="fa fa-user" aria-hidden="true"></i>
       <div class="user-box">
     	<input type="text" name="email" placeholder="Email"><br>
      </div>

     	<label>Password</label><i class="fa fa-unlock-alt" aria-hidden="true"></i>
       <div class="user-box">
       <input type="password" name="password" placeholder="Password"><br>
   
      <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
 
    </a>  <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
          <a href="resetpass.php" class="ca" style="position:absolute;left:50%">Forget password</a>
     </form>

  






</body>
</html>