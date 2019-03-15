<!DOCTYPE html>
<html>
	<head>
  		<title>Login</title>
	</head>
	<body>
		<section>
	        <div>
	            <h3>Login</h3>
	        </div>
	        <div>
	            <form id="login_form" method="post" action = "api/login.php">
	                <div class="form-group">
	                    <label for="username">Username</label>
	                    <input type="text" class="form-control form-control-lg rounded-0" name="username" id="username" required>
	                </div>
	                <div class="form-group">
	                	<label for="password">Password</label>
	                    <input type="password" id="password" name="password" autocomplete="new-password" required>
	                </div>
	                <button type="submit" id="btnLogin">Login</button>
	            </form>
	        </div>
		</section>
	</body>
</html>