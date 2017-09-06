<?php

class MySQLDatabase
{
    private $connection;
    private $last_query;
    private $db_config = [
        'host' => 'localhost',
        'username' => 'TAK15_Akke',
        'password' => '123456',
        'db' => 'TAK15_Akke'
    ];

    function __construct() {
        $this->open_connection();
    }

    public function open_connection() {
        $this->connection = mysqli_connect(
            $this->db_config['host'],
            $this->db_config['username'],
            $this->db_config['password'],
            $this->db_config['db']
        );

        if(mysqli_connect_errno()) {
            echo "Connection failed: " . mysqli_connect_error();
        }
    }

    public function close_connection() {
        if(isset($this->connection)) {
            $this->connection->close();
            unset($this->connection);
        }
    }

    public function query($sql) {
        $this->last_query = $sql;
        $result = $this->connection->query($sql);
        $this->confirm_query($result);

        return $result;
    }

    private function confirm_query($result) {
        if(!$result) {
            $r = "Database query failed: " . mysqli_connect_error();
            $r.= "<p>SQL: {$this->last_query}</p>";
            die($r);
        }
    }

    public function fetch_array($result) {
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function escape_value($value) {
        return stripslashes($value);
    }

    public function check_last_query() {
        return $this->connection->affected_rows;
    }

    public function get_last_ID() {
        return $this->connection->insert_id;
    }
}

$database = new MySQLDatabase();