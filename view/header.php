<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Autos</title>
    <link rel="stylesheet" href="view/css/main.css"/>
</head>

<body>
    <main class="main">
    <?php if($action !== 'register' && !isset($_SESSION['userid'])) { ?>
        <p><a href=".?action=register">Register</a></p>    
    <?php } else if(isset($_SESSION['userid']) && ($action !== 'register' || $action !== 'logout')) { ?>
        <p>Welcome <?php echo $_SESSION['userid']; ?>! (<a href=".?action=logout">Sign Out</a>)</p>
    <?php } ?>
    <h1>Zippy Used Autos</h1>
        <hr>
