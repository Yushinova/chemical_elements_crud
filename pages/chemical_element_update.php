<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements_crud.php");

$updated = null;
if(isset($_GET["id"])){
    $id = intval($_GET["id"]);
    $updated = selectElementById($id);
}

if(isset($_POST["id"])&&isset($_POST["name"])&&isset($_POST["code"])&&isset($_POST["group"])&&isset($_POST["period"])&&isset($_POST["number_protons"])){
    $element = new ChemicalElement(
            id: intval($_POST["id"]),
            name: $_POST["name"],
            code: $_POST["code"],
            group: intval($_POST["group"]),
            period: intval($_POST["period"]),
            number_protons: intval($_POST["number_protons"]),
            isMetall: isset($_POST["is_metall"])
        );
   //func
    updateElement($element);
    header("Location: /pages/chemical_elements_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>Update element</title>
</head>
<body>
    <h2>Update element</h2>
    <?php if ($updated === null): ?>
        <p>Елемент не найден!</p>
    <?php else: ?>
    <form class="formUpdate" action="/pages/chemical_element_update.php" method="POST">
      <label for="id">ID</label>
      <input type="number" name="id" readonly value="<?= $updated->id ?>"/>
      <label for="name">Name</label>
      <input type="text" name="name" maxlenght="200" value="<?= $updated->name ?>"/>
      <label for="code">Code element</label>
      <input type="text" name="code" value="<?= $updated->code ?>"/>
      <label for="group">Group</label>
      <input type="number" name="group" min="1" value="<?= $updated->group ?>"></input>
      <label for="period">Period</label>
      <input type="number" name="period" min="1" value="<?= $updated->period ?>"></input>
      <label for="number_protons">Number of protons</label>
      <input type="number" name="number_protons" min="1" value="<?= $updated->number_protons ?>"></input>
      <label for="is_metall">IS METALL</label>
      <input type="checkbox" name="is_metall" <?= $updated->isMetall? "checked" : "" ?> style="width: 30px;"></input>
      <button>Save</button>
    </form>
    <?php endif; ?>
    <br/>
    <a href="/index.php">Home</a>
    <a href="/pages/chemical_elements_list.php">List elements</a>
</body>
</html>