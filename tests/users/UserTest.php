<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class UserTest extends TestCase
{
    use TestCaseTrait;

    private static $pdo = null;
    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }
 
        return $this->conn;
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataSet('./tests/users/users_fixture.xml');
    }

    public function testRowCount()
    {
        $this->assertSame(2, $this->getConnection()->getRowCount('users'), "Pre-Condition");
    }

    public function testAddUser()
    {
        require_once('./models/User.php');
        require_once('./models/Route.php');
        require_once('./models/DB.php');

        $user = new User();
        $user->email = 'tesla@gmail.com';
        $user->first_name = 'Nikola';
        $user->last_name = 'Tesla';
        $user->password = 'ac123dc';
        $user->filename = '';
        $user->save();
 
        $queryTable = $this->getConnection()->createQueryTable(
            'users',
            'SELECT id, email, first_name, last_name, password, filename FROM users'
        );
 
        $expectedTable = $this->createFlatXmlDataSet("./tests/users/users_save_expected.xml")
            ->getTable("users");
 
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    public function testUpdateUser()
    {
        require_once('./models/User.php');
        require_once('./models/Route.php');
        require_once('./models/DB.php');

        $user = new User();
        $user->id = 2;
        $user->email = 'gina.doe@gmail.com';
        $user->first_name = 'Gina';
        $user->last_name = 'Doe';
        $user->password = '987#doe';
        $user->filename = '';
        $user->update();
 
        $queryTable = $this->getConnection()->createQueryTable(
            'users',
            'SELECT id, email, first_name, last_name, password, filename FROM users WHERE id='.$user->id
        );
 
        $expectedTable = $this->createFlatXmlDataSet("./tests/users/users_update_expected.xml")
            ->getTable("users");
 
        $this->assertTablesEqual($expectedTable, $queryTable);
    }

    
    public function testFindUser()
    {
        require_once('./models/User.php');
        require_once('./models/Route.php');
        require_once('./models/DB.php');

        $user = User::find(1);
 
        $this->assertEquals($user->id, 1);
    }

    public function testEmailIsNullByDefault()
    {
        require_once('./models/User.php');
        require_once('./models/Route.php');
        require_once('./models/DB.php');
        
        $user = new User();
        $this->assertEquals(null, $user->email);
    }
}
