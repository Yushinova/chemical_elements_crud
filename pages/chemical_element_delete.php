<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements_crud.php");
$deleted = null;
if(isset($_GET["id"])){
    $id = intval($_GET["id"]);
    $deleted = selectElementById($id);
}
//var_dump($deleted);
//обработка удаления
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["action"]) && $_POST["action"]=="delete" && isset($_POST["id"])){
        $id = intval($_POST["id"]);
        deleteElementById($id);
        header("Location: /pages/chemical_elements_list.php");
    }else{
        header("Location: /pages/chemical_element_delete.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>Delete element</title>
</head>
<body>
    <h2>Delete element</h2>
    <?php if ($deleted === null): ?>
        <p>Елемент не найден!</p>
    <?php else: ?>
        <form action="/pages/chemical_element_delete.php" method="post">
            <input type="number" name="id" value="<?= $deleted->id ?>" hidden />
            <label for="delete">Вы действительно хотите удалить элемент '<?= $deleted->id.' - '.$deleted->name ?>'</label>
            <button id="delete" name="action" value="delete">Удалить</button>
        </form>
    <?php endif; ?>
    

    <a href="/pages/chemical_elements_list.php">List of elements<br></a>
    <a href="/index.php">Home</a>
</body>
</html>