<?
	
	$user = $this->session->userdata('user');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User Profile</title><link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
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
	form {
		margin-left: 10px;
	}
	h5 a[href="/profile"] {
		color: #0FA0CE;
	}
	</style>
</head>
<body>
<div class="container">
<div class="row">
	<header>
		<h3>Test App</h3>
		<?
			if($this->session->userdata['user']['permission'] == 9) {
				echo '<h5><a href="/dashboard/admin">Dashboard</a></h5>';
			} else {
				echo '<h5><a href="/dashboard">Dashboard</a></h5>';
			}
		?>
		<h5><a href="/profile">Profile</a></h5>
		<h5><a href="/main/logoff">Log Off</a></h5>
	</header>
</div>
<div class="row">
<div class="four columns">
	<h3>Edit Info</h3>
		<?

		if($this->session->flashdata('edit_errors')) {
			echo "<p>".$this->session->flashdata('edit_errors')."</p>";
		}

		?>
		<form action="/main/edit_user/<?= $user['id'] ?>" method="post">
			<div>
				<label>Email:</label>
				<input type="text" name="email" value="<?=$user['email']?>">
			</div>
			<div>
				<label>First Name:</label>
				<input type="text" name="first_name" value="<?=$user['first_name']?>">
			</div>
			<div>
				<label>Last Name:</label>
				<input type="text" name="last_name" value="<?=$user['last_name']?>">
			</div>
			<input type="submit" value="Change Info">
		</form>
</div>
<div class="eight columns">
	<?
	if($this->session->userdata['user']['permission'] == 9) {
		echo '<a id="back" href="/dashboard/admin"><button>Go Back To Dashboard</button></a>';
	} else {
		echo '<a id="back" href="/dashboard/"><button>Go Back To Dashboard</button></a>';
	}
	?>
	<h3>Change Password</h3>
	<?

	if($this->session->flashdata('pass_errors')) {
		echo "<p>".$this->session->flashdata('pass_errors')."</p>";
	}

	?>
	<form action="/main/edit_user_password/<?= $user['id'] ?>" method='post'>
		<div>
			<label>Password:</label>
			<input type="password" name="password">
		</div>
		<div>
			<label>Confirm Password:</label>
			<input type="password" name="confirm">
		</div>
		<input type="hidden" name="id" value="<?=$user['id']?>">
		<input type="submit" value="Change Password">
	</form>
</div>
</div>
</body>
</html>