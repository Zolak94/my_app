<?php
use PHPUnit\Framework\TestCase;
class UserTest extends TestCase
{
    public function testEmailIsNullByDefault()
    {
        require_once('./models/User.php');
        require_once('./models/Route.php');
        require_once('./models/DB.php');
        
        $user = new User();
        $this->assertEquals(null, $user->email);
    }
}
?>