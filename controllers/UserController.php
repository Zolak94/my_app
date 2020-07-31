<?php
class UserController extends Controller
{
    public static function index()
    {
        $users = self::query("SELECT * FROM users");
        require_once('./views/Index.php');
    }

    public static function create()
    {
        require_once('./views/Create.php');
    }
    
    public static function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();
            $user->email = $_POST['email'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];
            $user->save();
        }
        header('Location: /');
    }
    
    public static function show()
    {
        $user = self::query("SELECT * FROM users WHERE id=".$_GET['id']);
        require_once('./Views/Show.php');
    }
}
