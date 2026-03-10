<?php

class User {

private $conn;
private $table = "users";

public function __construct($db)
{
    $this->conn = $db;
}
public function getAll()
{
    $stmt = $this->conn->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getOne($id)
{
    $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function create($name,$email)
{
    $stmt = $this->conn->prepare("INSERT INTOusers (name, email)VALUES (?,?");
    return $stmt->execute([$name, $email]);
}

public function update ($id, $name, $email)
{
    $stmt = $this->conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    return $stmt->execute([$name,$email,$id]);
}
public function delete($id)
{
     $stmt = $this->conn->prepare("DELETE FROMusers WHERE id=?");
     return $stmt->execute([$name, $email,$id]);
}
}

