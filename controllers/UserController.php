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
}
