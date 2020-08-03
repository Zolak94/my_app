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
            if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                if (!is_dir('uploads/')) {
                    mkdir('uploads/', 0755, true);
                }
                $folder = "uploads/";
                move_uploaded_file($_FILES["avatar"]["tmp_name"], "$folder" . $_FILES["avatar"]["name"]);
                $user->filename = $_FILES["avatar"]["name"];
            }
            $user->save();
        }
        header('Location: /');
    }

    public static function show()
    {
        $user = User::find($_GET['id']);
        require_once('./views/Show.php');
    }
    
    public static function edit()
    {
        $user = User::find($_GET['id']);
        require_once('./views/Edit.php');
    }
    
    public static function update()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = User::find($_POST['id']);
            $user->email = $_POST['email'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];
            if (isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
                if (!is_dir('uploads/')) {
                    mkdir('uploads/', 0755, true);
                }
                // if user is uploading avatar first we will delete old one
                $old_avatar = "uploads/".$user->filename;
                if (file_exists($old_avatar)) {
                    unlink($old_avatar);
                }
                // uploading new avatar
                $folder = "uploads/";
                move_uploaded_file($_FILES["avatar"]["tmp_name"], "$folder" . $_FILES["avatar"]["name"]);
                $user->filename = $_FILES["avatar"]["name"];
            }
            $user->update();
        }
        header('Location: /');
    }

    public static function delete()
    {
        if (isset($_GET['id'])) {
            $user = User::find($_GET['id']);
            // first we need to find user and delete his avatar before deleting user
            $avatar = "uploads/".$user->filename;
            if (file_exists($avatar) && count(glob("uploads/*")) !== 0) {
                unlink($avatar);
            }
            $user->delete();
            header('Location: /');
        }
    }
}
