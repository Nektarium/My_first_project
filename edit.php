<?php
	
	$pdo = new PDO('mysql:host=localhost;dbname=my_new_DB;charset=utf8;', 'root', '123');				
	$idLink = isset($_GET['id']) ? $_GET['id'] : '';
	$sql = "SELECT * FROM `users` WHERE id={$idLink}";
	$statement = $pdo->prepare($sql);		
	$statement->execute();			
	$users = $statement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Edit User ID <?php echo $idLink;?></h1>
				<form action="editor.php" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="id" value="">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="usernameEdit" class="form-control" value="<?php echo $users['Username'];?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="emailEdit"class="form-control" value="<?php echo $users['Email'];?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="passwordEdit" class="form-control" value="<?php echo $users['Password'];?>">

					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-warning">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>