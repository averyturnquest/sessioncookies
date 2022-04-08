<?php include 'view/header.php';?>
<?php if(!isset($_SESSION['userid'])){ ?>
<p>Please enter your first name:</p>
    <form action="." method="get" id="add_form" class="add_form">
        <input type="hidden" name="action" value="register">
        <div class="add_inputs">
            <input type="text" name="first_name" maxlength="16" placeholder="Name" autofocus required>
        </div>
        <div class="add_addItem">
            <button class="add-button bold">Register</button>
        </div>
    </form>
<?php } else { ?> 
    <h2>Thank you for registering, <?php echo $_SESSION['userid']; ?>!</h2>
    <p><a href=".?action=make">Click here</a> to view our vehicle list.</p>

<?php } ?>
<?php include 'view/footer.php';?>