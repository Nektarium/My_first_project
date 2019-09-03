<?php  
	
	print_r($_FILES['Image']);

	if(isset($_FILES["Image"])):

	$uploaddir = "/Users/nektarium/www/My_first_project/uploads/";
    $uploadfile = $uploaddir . basename($_FILES['Image']['name']);
    $tmp_name = $_FILES["Image"]["tmp_name"];
    $new_name = "/Users/nektarium/www/My_first_project/uploads/".time().".jpg";

	if (move_uploaded_file($tmp_name, $new_name)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }        
endif;

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
				<form action="" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<input type="file" name="Image" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>