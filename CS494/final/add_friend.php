<?php
	$user = "";
	session_start();
	if(!isset($_SESSION['loggedin'])) {
		header("Location: main.php");
	}
	if(isset($_SESSION['name'])) {
		$user = $_SESSION['name'];
	}

	$success = false;
	$error = false;
	$friend = $_POST['friend'];

//Turn on error reporting
	ini_set('display_errors', 'On');
//Connects to the database
	$mysqli = new mysqli('oniddb.cws.oregonstate.edu','conleyme-db','t50AD6dCxtftZ7zb','conleyme-db');

// See if user already has user as friend
	$search = "SELECT friend FROM friends WHERE user = '$user' AND friend = '$friend'";
	if(!($query = $mysqli->prepare($search))) {
		echo 'Preparation failed: (' . $mysqli->errno . ') ' . $mysqli->error;
	}
	if(!$query->execute()) {
		echo 'Execute failed: (' . $query->errno . ') ' . $query->error;
	}
	$result = $query->get_result(); 
	$row_count = $result->num_rows;
	$query->close();
	if($row_count > 0) { 
		//echo "Error";
		$error = true;
	} else {
	// Prepare insert query
		if(!($stmt = $mysqli->prepare("INSERT INTO friends(user, friend) VALUES (?,?)"))){
			echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
		}

	// Bind variables
		if(!($stmt->bind_param("ss", $user, $friend))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}

	// Execute query
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;

		} 
		//echo "Success";
		$success = true;
		$stmt->close();
	}
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>Pokemon Team Builder</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="ajax_verify.js"></script>
	</head>

<body>
<div class = "container">
	<div class="left-nav">
		<h3>Navigation</h3>
		<ul>
			<li><a href="list_home.php">My Lists</a></li>
			<li><a href="create_list.php">Create a List</a></li>
			<li><a href="friends_lists.php">See Lists Shared With Me</a></li>
			<li><a href="find_friends.php">Find Friends</a></li>
		</ul>
	</div>
	<div class ="main">

	<h1>The Pokemon Team Builder</h1>

	<?php
	if($success) { ?>
		<p>Successfully added <?php echo $friend ?> as a friend.</p>
	<?php 
	} else { ?>
			<div class="error">Error: you are already friends with <?php echo $friend ?>!</div>
		<?php 
		} ?>
	</div>
		<div class = "right-nav">
		<h3>My Account</h3>
			<div class ="profile">
			<?php // if user already has profile picture, display it here
			$filename = 'images/'.$user.'.jpg';
			if(file_exists($filename)) { ?>
				<img src = "<?php echo $filename ?>" alt = "user profile photo">
			<?php } else { // if not, give them the royalty-free clipart temporary one ?>
				<img src = "images/temp.jpg">
			<?php } ?>
			<span>Currently logged<br>
					in as:<br>
					<b><?php echo $user ?></b></span>
			</div>
		<ul>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	</div>
</div>
</body>
