<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src="https://kit.fontawesome.com/7000d5be7c.js" crossorigin="anonymous"></script>


</head>
<body>

    <?php
        if(isset($_SESSION['message'])){
            echo "<h4>" . $_SESSION['message'] . "</h4>";
        }
    ?>

	<div class="container" id="container">
    <div class="form-container sign-up-container">
    	 <form action="user_store.php" method="POST">
        <h1>Create Account</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your email </span>
        <input type="text" name="name" placeholder="Name" />
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <button>Sign Up</button>
    </form>
       
    </div>
    <div class="form-container sign-in-container">
    	<form action="login_check.php" method="POST">
        <h1>Sign in</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your account</span>
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <a href="#">Forgot your password?</a>
        <button>Sign In</button>
    </form>
        
    </div>
    <div class="overlay-container">
    	<div class="overlay">
        	<div class="overlay-panel overlay-left">
            	<h1>Welcome Back</h1>
            	<p>
                	 please login with your personal info
            	</p>
            	<button class="ghost" id="signIn">Sign In</button>
        	</div>
        	<div class="overlay-panel overlay-right">
            	<h1>Hello, Friend!</h1>
            	<p>Enter your personal details </p>
            	<button class="ghost" id="signUp">Sign Up</button>
        	</div>
   		 </div>
        
    </div>
<script src="login.js"></script>

</body>
</html>