<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
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

  $transport->TransportID = $data->transportId;
  $transport->StationID = $data->stationId;
  $transport->BranchID = $data->branchId;
  $transport->SchoolID = $data->schoolId;
  $transport->SchoolUUID = $data->schooluuId;



  // Create post
  if($transport->create()) {


      $data = file_get_contents("php://input");

      // Prepare new cURL resource
      //$curl = new Curl('../public_system/api/stransportschool/create.php',$data);

    echo json_encode(
      array('message' => 'School Transport Created')
    );
  } else {
    echo json_encode(
      array('message' => 'School Transport Not Created')
    );
  }

