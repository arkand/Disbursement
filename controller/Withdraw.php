<?php
require_once 'model/Disburse.php';
require_once 'model/Service.php';

/**
 * Class Withdraw
 * @author  Ali Alharkan <alialharkan@gmail.com>
 * Controller
 */
class Withdraw{

    private $model = NULL;

    public function __construct() {
        $this->model = new Disburse();
    }

    /**
     * Show all disbursement data
     * @return view list table
     */
    public function lists() {
        $rows = $this->model->getAll();
        $title = "Transaction List";
        require_once 'view/list.php';
    }

    /**
     * Check Disbursement data
     * Update status, receipt and time_served when result changes
     * @param $_GET['id']
     * @return view detail
     */
    public function check() {

        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if (is_null( $id)) {
            throw new Exception('ID not found.');
        }
        $response = Service::make()->get($id);
        $result = json_decode($response);

        $row = $this->model->find($id);
        $title = "Detail Transaction ";
        if(!$row)
        {
            if($result->id){
                $new_data = $this->model->create($result);
            }
        }
        if($row AND ($row->status !== $result->status) )
        {
            $row = $this->model->update($id, $result);
            if($row)
                $title = $title. "Updated";
        }

        require 'view/detail.php';
    }

    /**
     * Show input form
     * add new disbursement
     * @return view input
     */
    public function add() {
        $title = "Request New Disbursement";
        require_once 'view/add.php';
    }

    /**
     * Create Disbursement data
     * using Flip API
     * @param $_POST
     * @return view detail
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bank_code = isset($_POST['bank_code']) ? $_POST['bank_code'] : '';
            $account_number = isset($_POST['account_number']) ? $_POST['account_number'] : '';
            $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
            $remark = isset($_POST['remark']) ? $_POST['remark'] : NULL;
            if($bank_code == '' || $account_number == '' || $amount <= 0 || $remark == ''){
                throw new Exception('Invalid Input');
            }
            $response = Service::make()->post($_POST);
            $result = json_decode($response);

            if(empty($result->errors)) {
                $row = $this->model->create($result);
                $title = "Success";
                require 'view/detail.php';
            } else 
                throw new Exception('Invalid Input');

        }
    }
}