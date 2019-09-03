<?php

	$pdo = new PDO('mysql:host=localhost;dbname=my_new_DB;charset=utf8;', 'root', '123');				
	$idLink = isset($_GET['id']) ? $_GET['id'] : '';
	$sql = "SELECT * FROM `users` WHERE id='$idLink'";
	$statement = $pdo->query($sql);					
	$users = $statement->fetchAll();
	print_r($_POST);

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
				<?php foreach ($users as $elem):?>
				<h1>Edit User ID <?php echo $idLink;?></h1>
				<form action="editor.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?=$elem['id']?>">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="usernameEdit" class="form-control" value="<?php echo $elem['Username'];?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="emailEdit"class="form-control" value="<?php echo $elem['Email'];?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="passwordEdit" class="form-control" value="<?php echo $elem['Password'];?>">

					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-warning">Submit</button>
					</div>
				</form>
			<?php endforeach;?>
			</div>
		</div>
	</div>
</body>
</html>