<?
	if($this->session->userdata('user')) {
		redirect("/main/dashboard/{$this->session->userdata['user']['permission']}");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/skeleton.css">
	<style type="text/css">

		header h5, h3 {
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
		<h3>Register</h3>
		<?

		if($this->session->flashdata('reg_errors')) {
			echo $this->session->flashdata('reg_errors');
		}

		?>
		<form action="/main/add_user/register" method="post">
			<div>
				<label>Email:</label>
				<input type="text" name="email">
			</div>
			<div>
				<label>First Name:</label>
				<input type="text" name="first_name">
			</div>
			<div>
				<label>Last Name:</label>
				<input type="text" name="last_name">
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password">
			</div>
			<div>
				<label>Password Confirmation:</label>
				<input type="password" name="confirm">
			</div>
			<input type="submit" value="Create">
		</form>
		<a href="/login"><button>Back</button></a>
	</div>
</div>
</body>
</html>