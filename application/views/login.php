<?

	if($this->session->userdata('user')) {
		redirect("/main/dashboard/{$this->session->userdata['user']['permission']}");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/skeleton.css">
	<style type="text/css">

		header h5, header h3 {
			display: inline-block;
		}

		header a {
			text-decoration: none;
		}

		header h5, header h3, header a {
			margin-right: 30px;
			color: black;
			margin-bottom: 10px;
		}

		h5:last-child {
			float: right;
			margin-top: 10px;
		}

		header {
			padding: 0px 10px;
			border-bottom: 1px solid black;
			margin-bottom: 20px;
		}

	</style>
</head>
<body>
<div class="container">
<div class="row">
	<header>
		<h3>Test App</h3>
		<h5><a href="/">Home</a></h5>
		<h5><a href="/login">Sign In</a></h5>
	</header>
	<h3>Sign In</h3>
	</div>
	<?

	if($this->session->flashdata('login_errors')) {
		echo $this->session->flashdata('login_errors');
	}

	?>
	<form action="/main/login_user" method="post">
		<div>
			<label>Email Address:</label>
			<input type="text" name="email">
		</div>
		<div>
			<label>Password:</label>
			<input type="password" name="password">
		</div>
		<input type="submit" value="Sign In">
	</form>
	<a href="/register/"><button>Not Registered?</button></a>
</div>
</div>
</body>
</html>