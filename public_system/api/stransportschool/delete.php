<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../controllers/Stransportschool.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$transport = new Stransportschool($db);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$transport->id = $data->id;
$transport->DeletedAt = date('Y-m-d H:i:s');

// Update post
if($transport->delete()) {
    echo json_encode(
        array('message' => 'School Transport Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'School Transport Not Deleted')
    );
}

