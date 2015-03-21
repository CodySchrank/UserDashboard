<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/skeleton.css">
	<style type="text/css">
		h2 {
			display: inline-block;
		}

		header h5, header h3 {
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

		header h5:last-child {
			float: right;
			margin-top: 10px;
		}

		th:first-child {
			font-size: 20px;
			font-weight: normal;
		}

		header {
			padding: 0px 10px;
			border-bottom: 1px solid black;
			margin-bottom: 20px;
		}

		#message textarea {
			width: 100%;
		}

		#message {
			width: 80%;
		}

		.main {
			padding: 0% 5%;
		}

	</style>
</head>
<body>
<div class="container">
<div class="row">
	<header>
		<h3>Test App</h3>
		<h5><a href="/dashboard">Dashboard</a></h5>
		<h5><a href="/profile">Profile</a></h5>
		<h5><a href="/main/logoff">Log Off</a></h5>
	</header>
	<div class="main">
	<table>
		<thead>
			<tr>
				<th><?=ucwords($user['first_name'].' '.$user['last_name'])?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Registered At:</td>
				<td><?=$user['created_at']?></td>
			</tr>
			<tr>
				<td>User ID:</td>
				<td><?=$user['id']?></td>
			</tr>
			<tr>
				<td>Email Address:</td>
				<td><?=$user['email']?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?=$user['description']?></td>
			</tr>
		</tbody>
	</table>
	<h5>Leave A Message for <?=ucwords($user['first_name'])?></h5>
	<form id="message" action="/main/post_message">
		<textarea name="message"></textarea>
		<input type="submit" value="Post">
	</form>
	</div>
</div>
</div>
</body>
</html>