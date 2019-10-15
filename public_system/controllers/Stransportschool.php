<?php 
  class Stransportschool {
    // DB stuff
    private $conn;
    private $table = 'stransportschool';

    // Post Properties
    public $id;
    public $TransportID;
    public $StationID;
    public $BranchID;
    public $SchoolID;
    public $SchoolUUID;
    public $CreatedAt;
    public $UpdatedAt;
    public $DeletedAt;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }



    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET StationID = :StationID, BranchID = :BranchID, SchoolID = :SchoolID, SchoolUUID = :SchoolUUID, TransportID = :TransportID';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

        // Bind data
        $stmt->bindParam(':TransportID', $this->TransportID);
        $stmt->bindParam(':StationID', $this->StationID);
        $stmt->bindParam(':BranchID', $this->BranchID);
        $stmt->bindParam(':SchoolID', $this->SchoolID);
        $stmt->bindParam(':SchoolUUID', $this->SchoolUUID);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET StationID = :StationID, BranchID = :BranchID, SchoolID = :SchoolID, SchoolUUID = :SchoolUUID, TransportID = :TransportID
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);


          // Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':TransportID', $this->TransportID);
        $stmt->bindParam(':StationID', $this->StationID);
        $stmt->bindParam(':BranchID', $this->BranchID);
        $stmt->bindParam(':SchoolID', $this->SchoolID);
        $stmt->bindParam(':SchoolUUID', $this->SchoolUUID);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
        $query = 'UPDATE ' . $this->table . ' SET  DeletedAt = :DeletedAt WHERE id = :id';

//        var_dump($query); die();
        // Prepare statement
        $stmt = $this->conn->prepare($query);


        // Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':DeletedAt', $this->DeletedAt);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }
    
  }