<?php

class DB {
    private $pdo;
    private $config;
    
	public function __construct()
	{
        $this->configs = require_once('config/app.php');
		$this->connect();
    }
    
    public function connect() {
        try {
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            return $this->pdo = new PDO($this->configs['dbtype'] . ':host=' . $this->configs['hostname'] . ';dbname=' . $this->configs['database'], $this->configs['username'], $this->configs['password'], $options);
        } catch (Exception $e) {
            throw $e;
        }
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
}