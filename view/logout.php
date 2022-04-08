

<?php include 'view/header.php';?>
<h2>Thank you for signing out, <?php echo $_SESSION['userid']; ?>.</h2>
<p><a href=".?action=make">Click here</a> to view our vehicle list.</p>

<?php
session_unset();
session_destroy();
setcookie('userid', $first_name, time() - 3600);
?>

<?php include 'view/footer.php';?>