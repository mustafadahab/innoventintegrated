<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../controllers/Stransportschool.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();


$request = json_decode(file_get_contents("php://input"));
$action =explode("_",$request->action);

$table = $action[0];
$operation = $action[1];

// Instantiate blog post object
$transport = new $table($db);


    switch ($table){
        case "stransportschool":{
            $transport->id = (isset($request->id)) ? $request->id : "";
            $transport->TransportID = (isset($request->transportId)) ? $request->transportId : "";
            $transport->StationID = (isset($request->stationId)) ? $request->stationId : "";
            $transport->BranchID = (isset($request->branchId)) ? $request->branchId : "";
            $transport->SchoolID = (isset($request->schoolId)) ? $request->schoolId : "";
            $transport->SchoolUUID = (isset($request->schooluuId)) ? $request->schooluuId : "";
            if($operation == "update")$transport->UpdatedAt = date('Y-m-d H:i:s');
            else if($operation == "delete")$transport->DeletedAt = date('Y-m-d H:i:s');

        }break;
    }


// Create post
if($transport->$operation()) {
    echo json_encode(array('message' => $operation." is done")
);
} else {
    echo json_encode(
        array('message' => $operation." Not successful")
    );
}
//include_once $table."/".$operation.".php";

