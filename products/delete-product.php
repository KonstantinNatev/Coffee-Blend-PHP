<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 
    $user_id = $_SESSION["user_id"];
	if (!isset($user_id)) {
		header("location: ".APPURL."");
	}

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $delete = $conn->query("DELETE FROM cart WHERE id=$id ");
        $delete->execute();

        header("location: cart.php");
    }
?>