<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../config/Curl.php';
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
$transport->TransportID = $data->transportId;
$transport->StationID = $data->stationId;
$transport->BranchID = $data->branchId;
$transport->SchoolID = $data->schoolId;
$transport->SchoolUUID = $data->schooluuId;
$transport->UpdatedAt = date('Y-m-d H:i:s');

  // Update post
  if($transport->update()) {
      $data = file_get_contents("php://input");

      // Prepare new cURL resource
      $curl = new Curl('http://localhost/AD_task/public_system/api/stransportschool/update.php',$data);

      echo json_encode(
      array('message' => 'School Transport Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'School Transport Not Updated')
    );
  }

