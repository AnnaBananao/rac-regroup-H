<?php 
class DatabaseConnection {
    private $serverName = "localhost";
    private $userName = "elisa";
    private $password = "abcd";
    private $dbName = "assurance_auto";

    public function getConnection() {
        try {
            $conn = new mysqli($this-> serverName, $this-> userName, $this-> password, $this-> dbName);

            if($conn->connect_error) {
                echo "Can't connect to database";
            }

        } catch(Exception $e) {
                echo "Can't connect to database";
        }

        return $conn;
    }
}

?>