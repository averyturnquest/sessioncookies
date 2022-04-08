<?php
require('model/database.php');
require('model/classes_db.php');
require('model/makes_db.php');
require('model/types_db.php');
require('model/vehicles_db.php');

$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);

$class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);

$first_name = filter_input(INPUT_GET, 'first_name', FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'make';
    }
}

if(isset($first_name)){
    $_SESSION["userid"] = $first_name;
}

switch($action){
    case "make":
        $vehicles = get_vehicles_by_make($make_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('view/vehicle_list.php');
        break;
        
    case "class":
        $vehicles = get_vehicles_by_class($class_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('view/vehicle_list.php');
        break;
    
    case "type":
        $vehicles = get_vehicles_by_type($type_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('view/vehicle_list.php');
        break;

        case "year":
            $vehicles = get_vehicles_by_year($make_id);
            $makes = get_makes();
            $classes = get_classes();
            $types = get_types();
            include('view/vehicle_list.php');
            break;
    
        case "price":
            $vehicles = get_vehicles_by_price($make_id);
            $makes = get_makes();
            $classes = get_classes();
            $types = get_types();
            include('view/vehicle_list.php');
            break;
        
        case "register":   
            include ('view/register.php');
            break;

        case "logout":
            include('view/logout.php');
            break;

    default:
    $vehicles = get_vehicles_by_make($make_id);
    $makes = get_makes();
    $classes = get_classes();
    $types = get_types();
    include('view/vehicle_list.php');
    break;
}



?>