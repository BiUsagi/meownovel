<?php
namespace models\core;

use mysqli;

class Connect extends mysqli
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "meownovel";


    public function __construct()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->connect_error) {
            die("Connection failed: " . $this->connect_error);
        }
    }


}

?>