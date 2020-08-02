<?php
class Route
{
    public static $validRoutes = array();

    public static function set($route, $function)
    {
        self::$validRoutes[] = $route;
        $url = 'index.php';
        
        if (isset($_GET['url'])) {
           $url = $_GET['url'];
        }
        if ($url == $route) {
            $function->__invoke();
        }
    }
}
