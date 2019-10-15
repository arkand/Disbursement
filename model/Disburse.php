<?php
require_once("config/DB.php");

class Disburse {
    private $conn;
    private $table = 'disburse';

	function __construct()
	{
		$this->conn = new DB();
		$this->conn = $this->conn->open();
	}

	public function find($disburse_id) {
		try {
			$row = $this->conn->prepare("SELECT * FROM $this->table WHERE disburse_id = :disburse_id");
			$row->bindParam(':disburse_id', $disburse_id, PDO::PARAM_STR);
			$row->execute();
			$data = $row->fetch();

			return $data;
		} catch (Exception $e) {
            $this->conn->close();
            throw $e;
        }
	}

	public function create($data) {
		$sql = "INSERT INTO $this->table (disburse_id, amount, status, timestamp, bank_code, account_number, beneficiary_name, remark, receipt, time_served, fee) VALUES (:disburse_id, :amount, :status, :timestamp, :bank_code, :account_number, :beneficiary_name, :remark, :receipt, :time_served, :fee)";
		$model = $this->conn->prepare($sql);
		$model->execute([
			'disburse_id' => $data->id,
			'amount' => $data->amount,
			'status' => $data->status,
			'timestamp' => $data->timestamp,
			'bank_code' => $data->bank_code,
			'account_number' => $data->account_number,
			'beneficiary_name' => $data->beneficiary_name,
			'remark' => $data->remark,
			'receipt' => $data->receipt,
			'time_served' => $data->time_served,
			'fee' => $data->fee
		]);

		return $this->find($data->id);
	}
	public function getAll() {
        try {
			$sql = "SELECT * FROM $this->table limit 10";
			$query = $this->conn->prepare($sql);
			$rows = $query->execute();

			return $query->fetchAll();
        } catch (Exception $e) {
            $this->conn->close();
            throw $e;
        }
	}

	public function update($disburse_id, $data) {
		try {
			$sql = "UPDATE $this->table SET status = ?, receipt = ?, time_served = ? WHERE disburse_id = ?";
			$model = $this->conn->prepare($sql)->execute([$data->status, $data->receipt, $data->time_served, $disburse_id]);
			return $this->find($disburse_id);
		} catch (Exception $e) {
			$this->conn->close();
			throw $e;
		}
	}

}
