<?php
require('../model/database.php');
require('../model/classes_db.php');
require('../model/makes_db.php');
require('../model/types_db.php');
require('../model/vehicles_db.php');

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

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'make';
    }
}

switch($action){
    case "make":
        $vehicles = get_vehicles_by_make($make_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('../view/admin_vehicle_list.php');
        break;
        
    case "class":
        $vehicles = get_vehicles_by_class($class_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('../view/admin_vehicle_list.php');
        break;
    
    case "type":
        $vehicles = get_vehicles_by_type($type_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('../view/admin_vehicle_list.php');
        break;

    case "year":
        $vehicles = get_vehicles_by_year($make_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('../view/admin_vehicle_list.php');
        break;

    case "price":
        $vehicles = get_vehicles_by_price($make_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('../view/admin_vehicle_list.php');
        break;

    case "list_vehicles":
        $vehicles = get_vehicles_by_make($make_id);
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();
        include('../view/admin_vehicle_list.php');
        break;

    case "list_makes":
        $makes = get_makes();
        include('../view/make_list.php');
        break;

    case "list_types":
        $types = get_types();
        include('../view/type_list.php');
        break;

    case "list_classes":
        $classes = get_classes();
        include('../view/class_list.php');
        break;

    case "vehicle_form":
        $makes = get_makes();
        $classes = get_classes();
        $types = get_types();

        include('../view/add_vehicle_form.php');

    case "add_vehicle":
        if($make_id && $class_id && $type_id && $year && $model && $price){
            add_vehicle($make_id, $class_id, $type_id, $year, $model, $price);
            header("Location .?make_id=$make_id");
        } else {
           // $error = "Invalid vehicle data. Check all fields and try again.";
            //include('../view/error.php');
        }
        break;

    case "delete_vehicle":
        if($vehicle_id){
            delete_vehicle($vehicle_id);
            header("LocationL .?make_id=$make_id");
        } else{
            $error = "Missing or incorrect vehicle.";
            include('../view/error.php');
        }
        break;

    case "add_make":
        add_make($make_name);
        header("Location: .?action=list_makes");
        break;

    case "delete_make":
        if($make_id){
            try{
                delete_make($make_id);
            } catch(PDOException $e){
                $error = "You cannot delete a category if items exist in the category";
                include('view/error.php');
                exit();
            }
            header("Location .?action=list_makes");
        }
        break;

    case "add_class":
        add_class($class_name);
        header("Location: .?action=list_classes");
        break;

    case "delete_class":
        if($class_id){
            try{
                delete_class($class_id);
            } catch(PDOException $e){
                $error = "You cannot delete a category if items exist in the category";
                include('view/error.php');
                exit();
            }
            header("Location .?action=list_classes");
        }
        break;
    case "add_type":
        add_type($type_name);
        header("Location: .?action=list_types");
        break;

    case "delete_type":
        if($type_id){
            try{
                delete_type($type_id);
            } catch(PDOException $e){
                $error = "You cannot delete a category if items exist in the category";
                include('view/error.php');
                exit();
            }
            header("Location .?action=list_types");
        }
        break;

    default:
    $vehicles = get_vehicles_by_make($make_id);
    $makes = get_makes();
    $classes = get_classes();
    $types = get_types();
    include('../view/admin_vehicle_list.php');
    break;
}



?>