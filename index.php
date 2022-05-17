<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="style.css" type="text/css" rel="stylesheet">
	<title>Лабораторна работа 5</title>
</head>

<?php include("bd.php");?>

<body>
<form action="items.php" method="post">
   <h3>Выберите производителя:</h3>
    <select name="vendor">    
       <?php echo gen_options('name', 'vendors'); ?>
    </select>
    <input type="hidden" value="vendor" name="type" id="type">
    <input type="submit" value="Search">
  </form>

  <form action="items.php" method="post">
   <h3>Выберите категорию:</h3>
    <select name="category">    
       <?php echo gen_options('name', 'category'); ?>
    </select>
    <input type="hidden" value="category" name="type" id="type">
    <input type="submit" value="Search">
  </form>

  <form action="items.php" method="post">
   <h3>Выберите ценовой диапазон:</h3>
   <?php echo gen_price_range(); ?>
    <input type="hidden" value="price" name="type" id="type">
    <input type="submit" value="Search">
  </form>
</body> 
</html>

