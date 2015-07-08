<?php


class SampleTest extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $db = new PDO("mysql:host=localhost;dbname=formsgenerator", 
                       "siteuser", "cs6920final");
        return $this->createDefaultDBConnection($db, "formsgenerator");
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createMySQLXMLDataSet('seed.xml');
    }

    function testNonDatabaseBasedTestExample()
    {
        $expected = 1;
        $actual = 1;
        $this->assertEquals($expected, $actual);
    }
}
?>
