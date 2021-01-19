<?php
require './Classes/DB.php';
$db = new DB();

// gausim visus irasus is posts lenteles
$postDataArr = $db->getPosts();

var_dump($postDataArr);
require './inc/head.php';
?>
<?php echo $db->status;?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main class="container">
    
    <h1>PHP BLOG</h1>

    </main>

    
</body>
</html>