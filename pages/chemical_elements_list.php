<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements_crud.php");
$elements = selectAllElements();
//print_r($elements);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>List elements</title>
</head>
<body>
    <h2>List chemical elements</h2>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($elements as $value):?>
               <tr>
                <td><?=$value->id ?></td>
                <td><?=$value->name ?></td>
                <td><?=$value->code ?></td>
                <td><?=$value->group ?></td>
                <td><?=$value->period ?></td>
                <td><?=$value->number_protons ?></td>
                <td><?=$value->isMetall? "YES": "NO" ?></td>
                <td>
                    <a href="/pages/chemical_element_delete.php?id=<?= $value->id ?>">Delete</a>
                    <a href="/pages/chemical_element_update.php?id=<?= $value->id ?>">Update</a>
                </td>
               </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <br/>
    <a href="/index.php">Home</a>
    <a href="/pages/chemical_element_create.php">Create new</a>
</body>
</html>