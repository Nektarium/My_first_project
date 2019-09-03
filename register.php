<?php
	
	$pdo = new PDO('mysql:host=localhost;dbname=my_new_DB;charset=utf8;', 'root', '123');

	$db_table = "users";

	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$old_name = $_FILES["Image"]["name"];
	$tmp_name = $_FILES["Image"]["tmp_name"];
    $new_name = md5($old_name.time().random_int(100,10000));
    $new_filename = "/Users/nektarium/www/My_first_project/uploads/".$new_name.".jpg";
    $Image = $_FILES['Image'];

	if ($Username == true and $Email == true and $Password == true) {
		$sql = "SELECT * FROM `users` WHERE Email='$Email'";
        $statement = $pdo->query($sql);                        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($users) {
            echo "Указанный Вами почтовый адрес уже занят <a href='create.php'>Вернуться</a>";
	}
	else {
		$resultSelect = $pdo->prepare("INSERT INTO ".$db_table." (`Username`, `Email`, `Password`) VALUES (:Username, :Email, :Password)");
		$resultSelect->bindParam(':Username', $Username);
        $resultSelect->bindParam(':Email', $Email);
        $resultSelect->bindParam(':Password', $Password);
        $resultSelect->execute();
        move_uploaded_file($tmp_name, $new_filename);
        header("Location:index.php");
		}
	} else {
		echo "Заполните все необходимые поля <a href='create.php'>Вернуться</a>";
	} 

?>
