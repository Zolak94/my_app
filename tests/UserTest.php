<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class GuestBookTest extends TestCase
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
        return $this->createFlatXmlDataSet('./tests/users_fixture.xml');
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
        $user->save();
 
        $queryTable = $this->getConnection()->createQueryTable(
            'users',
            'SELECT id, email, first_name, last_name, password FROM users'
        );
 
        $expectedTable = $this->createFlatXmlDataSet("./tests/users_expected.xml")
            ->getTable("users");
 
        $this->assertTablesEqual($expectedTable, $queryTable);
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
