<?php
function get_vehicles_by_make($make_id){
    global $db;
    if($make_id){
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        WHERE V.makeID = :make_id ORDER BY `year`';
    } else{
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        ORDER BY `year`';
    }
    $statement = $db->prepare($query);
    if($make_id){
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type($type_id){
    global $db;
    if($type_id){
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        WHERE V.typeID = :type_id ORDER BY vehicleID';
    } else{
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        ORDER BY T.typeID';
    }
    $statement = $db->prepare($query);
    if($type_id){
        $statement->bindValue(':type_id', $type_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($class_id){
    global $db;
    if($class_id){
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        WHERE V.classID = :class_id ORDER BY vehicleID';
    } else{
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        ORDER BY C.classID';
    }
    $statement = $db->prepare($query);
    if($class_id){
        $statement->bindValue(':class_id', $class_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_year($make_id){
    global $db;
    if($make_id){
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        WHERE V.makeID = :make_id ORDER BY `year`';
    } else{
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        ORDER BY `year`';
    }
    $statement = $db->prepare($query);
    if($make_id){
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_price($make_id){
    global $db;
    if($make_id){
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        WHERE V.makeID = :make_id ORDER BY `year`';
    } else{
        $query ='SELECT V.vehicleID, V.model, V.price, V.year, M.makeName, C.className, T.typeName FROM vehicles V
        LEFT JOIN make M ON V.makeID = M.makeID 
        LEFT JOIN class C on V.classID = C.classID
        LEFT JOIN type T on V.typeID = T.typeID
        ORDER BY `price`';
    }
    $statement = $db->prepare($query);
    if($make_id){
        $statement->bindValue(':make_id', $make_id);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function add_vehicle($make_id, $class_id, $type_id, $year, $model, $price){
    global $db;
    $query = 'INSERT INTO `vehicles`(`year`, `model`, `price`, `makeID`, `classID`, `typeID`) VALUES (:year,:model,:price,:make_id,:class_id,:type_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($vehicle_id){
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}


function get_vehicle($vehicle_id){
    global $db;
    $query = 'SELECT * FROM vehicles
    WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
}

?>