<?php

class  Database
{
    private $host = "localhost";
    private $db_name = "ceratex";
    private $username = "root";
    private $password = "root";
    public $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }
    }

    public function insert($firstName, $secondName, $age)
    {
        $query = "INSERT INTO users (`name`, `second_name`, `age`) VALUES (:firstName,:secondName,:age)";
        $stmt = $this->connect->prepare($query);
        return $stmt->execute(['firstName' => $firstName, 'secondName' => $secondName, 'age' => $age]);
    }

    public function read()
    {
        $data = [];
        $query = "SELECT * FROM users WHERE age > 18";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }
}

