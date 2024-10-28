<?php

$reqtype = $_SERVER['REQUEST_METHOD'];
$server_data = $_SERVER;

// print the whole request data

echo "<pre>";
print_r($server_data);
echo "</pre>";

if ($reqtype == 'POST') {




	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$checkbox = $_POST['checkbox'];
	$gender = $_POST['gender'];


	echo "Name: $name <br />";
	echo "Email: $email <br />";
	echo "Password: $password <br />";
	echo "Checkbox: $checkbox <br />";
	echo "Gender: $gender <br />";

} else {




echo '
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
</head>
<body>
	
    <form method="POST">
      <!-- name emailid, checkbox radiobox -->
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required /><br />
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required /><br />
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required /><br />
      <label>
        <input type="checkbox" id="checkbox" name="checkbox" required />
        Are you nice? </label
      ><br />

      <!-- radio asking gender -->
		<label>
        <input type="radio" id="lol" name="gender" value="Male" /> MALE
        <input type="radio" id="lol" name="gender" value="Female" /> FEMALE
        <input type="radio" id="lol" name="gender" value="Lol" /> LOL
      </label>
	
	  <input type="submit" value="Submit">
	  </input>
    </form>
</body>
</html>';
}
?>