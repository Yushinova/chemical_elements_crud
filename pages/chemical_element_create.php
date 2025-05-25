<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/src/elements_crud.php");
//$element = new ChemicalElement (name: "Тест", code: "T", group: 1, period: 1, number_protons: 1, isMetall: true);
//insertElement($element);
if(isset($_POST["name"])&&isset($_POST["code"])&&isset($_POST["group"])&&isset($_POST["period"])&&isset($_POST["number_protons"])){
    $element = new ChemicalElement(
            name: $_POST["name"],
            code: $_POST["code"],
            group: intval($_POST["group"]),
            period: intval($_POST["period"]),
            number_protons: intval($_POST["number_protons"]),
            isMetall: isset($_POST["is_metall"])
        );
    insertElement($element);
    header("Location: /pages/chemical_elements_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>Create element</title>
</head>
<body>
    <h2>Create element</h2>
    <form class="formCreate" action="/pages/chemical_element_create.php" method="POST">
      <label for="name">Name</label>
      <input type="text" name="name" maxlenght="200" required/>
      <label for="code">Code element</label>
      <input type="text" name="code" required/>
      <label for="group">Group</label>
      <input type="number" name="group" min="1" required></input>
      <label for="period">Period</label>
      <input type="number" name="period" min="1" required></input>
      <label for="number_protons">Number of protons</label>
      <input type="number" name="number_protons" min="1" required></input>
      <label for="is_metall">IS METALL</label>
      <input type="checkbox" name="is_metall" style="width: 30px;"></input>
      <button>Save</button>
    </form>
    <br/>
    <a href="/index.php">Home</a>
    <a href="/pages/chemical_elements_list.php">List elements</a>
</body>
</html>