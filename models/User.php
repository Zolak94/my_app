<?php
class User
{
    public $email;
    public $first_name;
    public $last_name;
    public $password;

    public function __construct(
        $email = null,
        $first_name = null,
        $last_name = null,
        $password = null
    ) {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
    }

    public function save()
    {
        $sql = "INSERT INTO users (email, first_name, last_name, password) VALUES (?,?,?,?)";
        $data = [$this->email, $this->first_name, $this->last_name, $this->password];
        DB::query($sql, $data);
    }
    
    public function update()
    {
        $sql = "UPDATE users SET email=?, first_name=?, last_name=?, password=? WHERE id=?";
        $data = [$this->email, $this->first_name, $this->last_name, $this->password, $this->id];
        DB::query($sql, $data);
    }
        
    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id=".$id;
        $user = DB::query($sql)[0];
        return $user;
    }
}
