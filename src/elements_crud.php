<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/src/connection.php");

class ChemicalElement {
    public function __construct(
       public int $id = 0,
       public string $name = "",
       public string $code = "",
       public int $group = 1,
       public int $period = 1,
       public int $number_protons = 1,
       public bool $isMetall = false
    ){
        
    }
}

function selectAllElements() : array {
    //открыть соединение
    $conn = openDbConnection();
    //запрос к бд
    $query = "SELECT id, name_f, code_f, group_f, period_f, number_protons_f, is_metall_f FROM chemical_elements_db.chemical_element_t";
    $result = $conn->execute_query($query);
    $elements = [];
    foreach ($result as $row){
        $elements[]= new ChemicalElement(
            id: $row["id"],
            name: $row["name_f"],
            code: $row["code_f"],
            group: $row["group_f"],
            period: $row["period_f"],
            number_protons: $row["number_protons_f"],
            isMetall: $row["is_metall_f"]===1
        );
    }
     // 5. закрыть соединение и вернуть результат
    $conn->close();
    return $elements;
}

function insertElement(ChemicalElement $element) : void {
    $conn = openDbConnection();
    $isMetall = $element->isMetall? 1 : 0;
    $query = "INSERT INTO chemical_element_t (name_f, code_f, group_f, period_f, number_protons_f, is_metall_f
) VALUES(?,?,?,?,?,?)";
    $statement = $conn->prepare($query);
    //привязка параметров
    $statement->bind_param("ssiiii", $element->name, $element->code, $element->group, $element->period, $element->number_protons, $isMetall);
    $statement->execute();
    $conn->close();
}

function selectElementById(int $id) : ?ChemicalElement {
    // 1. открыть соединение с БД
    $conn = openDbConnection();
    // 2. подготовить запрос к БД
    $query = "SELECT id, name_f, code_f, group_f, period_f, number_protons_f, is_metall_f FROM chemical_elements_db.chemical_element_t WHERE id=?";
    $statement = $conn->prepare($query);
    //рпивязка параметров
    $statement->bind_param("i", $id);
    //выполнить запрос
    $statement->execute();
    //считать результат
    $element = null;
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    if($row!==null && $row!==false){
        $element = new ChemicalElement(
        id: $row["id"],
            name: $row["name_f"],
            code: $row["code_f"],
            group: $row["group_f"],
            period: $row["period_f"],
            number_protons: $row["number_protons_f"],
            isMetall: $row["is_metall_f"]===1
        );
    }
    $conn->close();
    return $element;
}

function deleteElementById(int $id) : void {
    $conn = openDbConnection();
    $query = "DELETE FROM chemical_element_t WHERE id=?";
    $statement = $conn->prepare($query);
    //привязка параметров
    $statement->bind_param("i", $id);
    $statement->execute();
    $conn->close();
}

function updateElement(ChemicalElement $element) : void {
    $conn = openDbConnection();
    $query =  $query = "UPDATE chemical_element_t SET name_f = ?, code_f = ?, group_f = ?, period_f = ?, number_protons_f = ?, is_metall_f = ? WHERE id = ?";
    $statement = $conn->prepare($query);
    $isMetall = $element->isMetall? 1 : 0;
    $statement->bind_param("ssiiiii", $element->name, $element->code, $element->group, $element->period, $element->number_protons, $isMetall, $element->id);
    $statement->execute();
    $conn->close();
}