<?php

class DbConnection
{
    // Default properties
    protected $hostname = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $databaseName = 'result_portal';

    // Constructor (optional if hardcoded values suffice)
    public function __construct($hostname = null, $username = null, $password = null, $databaseName = null)
    {
        if ($hostname) $this->hostname = $hostname;
        if ($username) $this->username = $username;
        if ($password) $this->password = $password;
        if ($databaseName) $this->databaseName = $databaseName;
    }

    // Connect method
    public function connect()
    {
        $connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->databaseName);

        if (!$connection) {
            throw new Exception("Connection to server failed: " . mysqli_connect_error());
        }
        return $connection;
    }

    // Test connection method (for debugging)
    public function testConnection()
    {
        try {
            $this->connect();
            echo "Connection successful!";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
