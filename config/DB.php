<?php

class DB {
    private $pdo;
    private $config;

	public function __construct()
	{
        $this->configs = require_once('config/app.php');
		$this->connect();
    }

    public function connect()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $this->pdo = new PDO($this->configs['dbtype'] . ':host=' . $this->configs['hostname'] . ';dbname=' . $this->configs['database'], $this->configs['username'], $this->configs['password'], $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $this->pdo;
    }

    public function open()
	{
        if ($this->pdo instanceof PDO)
        {
            return $this->pdo;
        }
    }

    public function close()
	{
		$this->pdo = null;
    }

    public function createTable()
	{
        try {
            $sql = "CREATE TABLE `disburse` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `disburse_id` varchar(20) DEFAULT NULL,
                `bank_code` char(10) DEFAULT NULL,
                `account_number` char(20) DEFAULT NULL,
                `amount` bigint(20) DEFAULT NULL,
                `status` char(10) DEFAULT NULL,
                `beneficiary_name` varchar(50) DEFAULT NULL,
                `receipt` varchar(250) DEFAULT NULL,
                `fee` bigint(20) DEFAULT NULL,
                `timestamp` datetime DEFAULT NULL,
                `time_served` datetime DEFAULT NULL,
                `remark` varchar(250) DEFAULT NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `fkey` (`disburse_id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;";
            $db = $this->open();
            $db->exec($sql);

            print("Table Created.\n");

        } catch(PDOException $e) {
            echo $e->getMessage();//Remove or change message in production code
        }
		$this->pdo = null;
    }
}