<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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

	h5:last-child {
		float: right;
		margin-top: 10px;
	}

	header {
		padding: 0px 10px;
		border-bottom: 1px solid black;
		margin-bottom: 20px;
	}

	h5 a[href="/dashboard"] {
		color: #0FA0CE;
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
<h2>Users</h2>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created</th>
				<th>User Level</th>
			</tr>
		</thead>
		<tbody>
			<?
				foreach ($data as $item) {
					echo "<tr>";
					echo "<td>".$item['id']."</td>";
					echo "<td><a href='/main/show/{$item['id']}'>".ucwords($item['first_name'])." ".ucwords($item['last_name'])."</a></td>";
					echo "<td>".$item['email']."</td>";
					echo "<td>".$item['created_at']."</td>";
					if($item['permission'] == '9') {
						echo "<td>Admin Level</td>";
					} else {
						echo "<td>User Level</td>";
					}
				}
			?>
		</tbody>
	</table>
</div>
</div>
</body>
</html>