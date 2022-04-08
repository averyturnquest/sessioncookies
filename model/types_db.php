<?php
function delete_type($type_id){
    global $db;
    $query = 'DELETE FROM `type` WHERE typeID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_name){
    global $db;
    $query = 'INSERT INTO `type` (typeName) VALUES (:typeName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeName', $type_name);
    $statement->execute();
    $statement->closeCursor();
}

function get_type_name($type_id){
    if(!$type_id){
        return "All Types";
    }
    global $db;
    $query = 'SELECT * FROM `type` WHERE typeID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    $type_name = $type['typeName'];
    return $type_name;
}

function get_types(){
    global $db;
    $query = 'SELECT * FROM `type` ORDER BY typeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}


?>