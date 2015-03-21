<?
	if($id == 1) {
		die('<a href="/main/dashboard/9">GO BACK</a><br> Not Allowed to Delete user 1');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/normalize.css">
	<link rel="stylesheet" type="text/css" href="/assets/skeleton/skeleton.css">
</head>
<body>
<div class="container">
	<h3>Are You Sure You Want To Delete User <?= $id ?>?</h3>
	<a href="/dashboard/admin"><button>NO</button></a>
	<a href="/main/destroy_user/<?= $id ?>"><button>YES</button></a>
</div>
</body>
</html>