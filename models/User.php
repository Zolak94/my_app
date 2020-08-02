<?php
class User
{
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $filename;

    public function __construct(
        $email = null,
        $first_name = null,
        $last_name = null,
        $password = null,
        $filename = null
    ) {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->filename = $filename;
    }

    public function save()
    {
        $sql = "INSERT INTO users (email, first_name, last_name, password, filename) VALUES (?,?,?,?,?)";
        $data = [$this->email, $this->first_name, $this->last_name, $this->password, $this->filename];
        DB::query($sql, $data);
    }
    
    public function update()
    {
        $sql = "UPDATE users SET email=?, first_name=?, last_name=?, password=?, filename=? WHERE id=?";
        $data = [$this->email, $this->first_name, $this->last_name, $this->password, $this->filename, $this->id];
        DB::query($sql, $data);
    }
        
    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id=".$id;
        $user = DB::query($sql)[0];
        return $user;
    }
}
