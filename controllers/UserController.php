<?php

require_once __DIR__."/../models/User.php";

class UserController {

private $user;

public function __construct($db)
{
    $this->user = new User($db);
}
public function index()
{
    echo json_encode ($this->user->getAll());
}
public function show($id)
{
    echo json_encode($this->user->getOne($id));
}
public function store($data)
{
    $this->user->create($data['name'],$data['email']);
    echo json_encode(["message"=>"User created"]);
}
public function update($id,$data)
{
    $this->user->update($id,$data['name'],$data['email']);
    echo json_encode(["message"=>"User updated"]);
}
public function delete($id)
{
    $this->user->delete($id);
    echo json_encode(["message"=>"User deleted"]);
}
}


