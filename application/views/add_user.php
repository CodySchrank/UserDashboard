<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/skeleton.css">
	<style type="text/css">
	#back {
		float: right;
		display: inline-block;
		margin: 20px 20px 0px 0px;
	}
	h2 {
		display: inline-block;
	}

	header h5, h3 {
			display: inline-block;
		}

	header h5 a {
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
		<h5><a href="/dashboard/admin">Dashboard</a></h5>
		<h5><a href="/users/edit">Profile</a></h5>
		<h5><a href="/main/logoff">Log Off</a></h5>
	</header>
		<h3>Add User</h3>
		<a id="back" href="/dashboard/admin"><button>Go Back To Dashboard</button></a>
		<?

		if($this->session->flashdata('reg_errors')) {
			echo "<p>".$this->session->flashdata('reg_errors')."</p>";
		}

		?>
		<form action="/main/add_user/add" method="post">
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
</div>
</div>
</body>
</html>