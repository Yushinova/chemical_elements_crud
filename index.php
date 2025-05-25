<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>Chemical elements</title>
</head>
<body>
     <h2>Ping DB</h2>
    <?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/src/connection.php");
    pingDb();
    ?>
    <a href="/pages/chemical_elements_list.php">Elements</a>
</body>
</html>