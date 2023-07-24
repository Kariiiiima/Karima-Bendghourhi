<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet"  href="style22.css">
</head>
<body>
     <form action="signup-check.php" method="post"  class="login-box" style=" width:450px; padding:5px;">
     <div class="logo" ><img src="../login/img/logo.png"></div>
           </div>
     	<h2 style="margin-bottom:10px;">SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['nom'])) { ?>
               <input type="text" 
                      name="nom" 
                      placeholder="Name"
                      value="<?php echo $_GET['nom']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="nom" 
                      placeholder="Name"><br>
          <?php }?>

          <label>email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="email"><br>
          <?php }?>
          <label>prenom</label>
     	<input type="text" 
                 name="prenom" 
                 placeholder="prenom"><br>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>


          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
          
     	
      <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
 
    </a>
     </form>
</body>
</html>