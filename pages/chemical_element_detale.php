<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements_crud.php");

$element = null;
if(isset($_GET["id"])){
    $id = intval($_GET["id"]);
    $element = selectElementById($id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>Detale</title>
</head>
<body>
    <?php if ($element === null): ?>
        <p>Елемент не найден!</p>
    <?php else: ?>
    <h2><?=$element->name ?></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CODE</th>
                <th>GROUP</th>
                <th>PERIOD</th>
                <th>NUMBER OF PROTONS</th>
                <th>IS METALL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$element->id ?></td>
                <td><?=$element->name ?></td>
                <td><?=$element->code ?></td>
                <td><?=$element->group ?></td>
                <td><?=$element->period ?></td>
                <td><?=$element->number_protons ?></td>
                <td><?=$element->isMetall? "YES": "NO" ?></td>
            </tr>
        </tbody>
    </table>
    <?php endif; ?>
    <br/>
    <a href="/index.php">Home</a>
    <a href="/pages/chemical_elements_list.php">List of elements</a>
</body>
</html>