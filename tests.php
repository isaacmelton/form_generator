<?php

class StatisticsTest extends PHPUnit_Extensions_Selenium2TestCase 
{
    static private $conn = null;
    private $db = null;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    final public function getConnection()
    {
        if ($this->db === null) 
        {
            if (self::$conn === null)
            {
                self::$conn = $conn = new PDO("mysql:host=localhost;dbname=formsgenerator", 
                                          "siteuser", "cs6920final");
           }
           $this->db = $this->createDefaultDBConnection(self::$conn, "formsgenerator");
        }
        return $this->db;
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createMySQLXMLDataSet('seed.xml');
    }

//    public function eh(){include('model/statistics_db.php');}

    protected function setUp()
    {
        // Which browser to use
        $this->setBrowser('firefox');
        // The base URL
        $this->setBrowserUrl('http://localhost/cs6290_webform_generator/');
    }

    public function testWebsiteTitleTag()
    {
        // The URL to test
        $this->url('http://localhost/cs6290_webform_generator/index.php');
        // check the value of an element by ID
        $this->assertEquals('Forms Generator', $this->title());
    }



    public function testStatisticsQuery()
    {
        $surveys = get_surveys_by_title();
        $this->assertTrue(isset($surveys));
    }  






}
?>
