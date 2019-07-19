<?php 
$users = [

	[
		"id" => "1", 
	"Username" => "John Doe", 
	"Email" => "john@example.com"
	],

	["id" => "2", 
	"Username" => "Joseph Doe", 
	"Email" => "joseph@example.com"
	],

	["id" => "1", 
	"Username" => "Jane Doe", 
	"Email" => "jane@example.com"
	],

];
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
			<div class="col-md-12">
				<h1>User management</h1>
				<a href="create.html" class="btn btn-success">Add User</a>
				
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php 
						foreach ($users as $key) {
							echo 
							"<tr>
								<td>".$key['id']."</td>
								<td>".$key['Username']."</td>
								<td>".$key['Email']."</td>
								<td>
									<a href='edit.html' class='btn btn-warning'>Edit</a>
									<a href='#'' onclick='return confirm('are you sure?')'' class='btn btn-danger'>Delete</a>
								</td>
							</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>