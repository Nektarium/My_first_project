<?php 

    $pdo = new PDO('mysql:host=localhost;dbname=my_new_DB;charset=utf8;', 'root', '123');
    $db_table = "users";

    $idLink = isset($_GET['id']) ? $_GET['id'] : '';
    
	$usernameEdit = $_POST['usernameEdit'];
	$emailEdit = $_POST['emailEdit'];
	$passwordEdit = $_POST['passwordEdit'];

	if ($usernameEdit == true and $emailEdit == true and $passwordEdit == true) {
		/*$sql = "UPDATE `users` SET `Username` = '$nameEdit', `Email` = '$emailEdit', `password` = '$passEdit' WHERE `id` = '$idLink'";
		$statement = $pdo->query($sql);*/
		$resultUpdate = $pdo->prepare("UPDATE $db_table SET `Username` = :usernameEdit, `Email` = :emailEdit, `Password` = :passwordEdit WHERE `id` = :idEdit");
		$resultUpdate->bindParam(':usernameEdit', $usernameEdit);
		$resultUpdate->bindParam(':emailEdit', $emailEdit);
		$resultUpdate->bindParam(':passwordEdit', $passwordEdit);
		$resultUpdate->bindParam(':idEdit', $idLink);
		$resultUpdate->execute();
		$old_name = $_FILES["Image"]["name"];
		$tmp_name = $_FILES["Image"]["tmp_name"];
		$new_name = md5($old_name.time().random_int(100,10000));
		$new_filename = "/Users/nektarium/www/My_first_project/uploads/".$new_name.".jpg";
		move_uploaded_file($tmp_name, $new_filename);
		header("Location:index.php");
		
	}
?>
	
