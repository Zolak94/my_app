<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class DBTest extends TestCase
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
        return $this->createFlatXmlDataSet('./tests/db/db_fixture.xml');
    }

    public function testQueryFunction()
    {
        $queryTable = $this->getConnection()->createQueryTable(
            'users',
            'SELECT * FROM users'
        );
 
        $expectedTable = $this->createFlatXmlDataSet("./tests/db/db_query_expected.xml")
            ->getTable("users");
 
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}
