<?
	if($this->session->userdata('user')) {
		redirect("/main/dashboard/{$this->session->userdata['user']['permission']}");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/skeleton.css">
	<style type="text/css">

		.box {
			width: 300px;
			display: inline-block;
		}

		header h5, h3 {
			display: inline-block;
		}

		header a {
			text-decoration: none;
		}

		header h5, h3, a {
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
		<div class="main-box">
			<h2>Welcome To The Test</h2>
			<p>Were going to build a cool MVC application with no sleep</p>
			<a href="/login/"><button>Start</button></a>
		</div>
		<div class="main">
			<div class="box">
				<h4>Manage users</h4>
				<p>Learn how to do admin stuff</p>
			</div>
			<div class="box">
				<h4>Leave Messages</h4>
				<p>Users will be able to leave messages</p>
			</div>
			<div class="box">
				<h4>Edit User information</h4>
				<p>Ditto box 1</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>