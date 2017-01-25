<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TouchPay extends CI_Controller {
    
    private $model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('TouchPayModel');
        $this->model = new TouchPayModel();
    }
    
    function index(){
        $this->load->view('home');
    }
    
    function insertPayment(){
        $data = new stdClass();
        $data->firstname = $this->input->post('firstname');  
        $data->lastname = $this->input->post('lastname');
        $data->email = $this->input->post('email');
        $data->phone = $this->input->post('phone');
        $data->amount = $this->input->post('amount');
        $data->purpose = $this->input->post('purpose');
        $data->txn_ref = rand(0001, 9999);
        $data->product_id = '6205';
        $data->pay_item_id = '101';
        $id = $this->model->insertPayment($data);
        
        $payment = $this->getPayment($id); //txn_ref + product_id + pay_item_id + amount + site_redirect_url + mackey
        $payment->hash = hash('sha512', $payment->txn_ref.$payment->product_id.$payment->pay_item_id.$payment->amount."http://localhost/touchpay/"."AC43543FA32234HB23423AFH843535");
        
        echo json_encode($payment);
    }
    
    function getPayment($id){
        return $this->model->getPayment($id);
    }
    
    function test(){
        echo rand(0001, 9999);
        //echo hash('sha512', "oladapo");
    }
        
}
