<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> <?php echo $sSessionEmail; ?>  </title>
  <link rel="stylesheet" type="text/css" href="app.css">

  <?php echo $sLinkToCss ?? ''; ?>
  <?php echo $sAlert ?? ''; ?>

</head>
<body>


  <nav>
    <div>logo</div>

    <a href="login.php">
      <div>login</div>
    </a>
    
    <div>signup</div>

    <a href="about.php">
      <div>about</div>
    </a>

  </nav>