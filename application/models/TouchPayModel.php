<?php


/**
 * Description of TouchPayModel
 *
 * @author Adeleke Oladapo
 */
class TouchPayModel extends CI_Model {
    
    private $table_name = 'payment';
    
    function insertPayment($data){
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }
    
    function getPayments($sort_field = false, $sort_order_mode = false, $filter_field = false, $filter_value = false, $page = false, $page_size = false){ 
        $this->db->select('*');
        $this->db->order_by($sort_field, $sort_order_mode);
        ($filter_value) ? $this->db->where($filter_field, $filter_value) : '';
        ($page) ? $this->db->limit($page_size, $page) : $this->db->limit($page_size);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getPayment($id){
        $this->db->select('*');
        $this->db->where('payment_id', $id);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows()) ? $query->row() : null;
    }
    
}
