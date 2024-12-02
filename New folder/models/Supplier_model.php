<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

   public function getAllSuppliers() {
        $query = $this->db->get('supplier');
        return $query->result();
    }
     public function getAllSuppliers2($supplier_id) {
         $this->db->where('supplier_id',$supplier_id);
        $query = $this->db->get('supplier2');
        return $query->result();
    }
   

    public function getSingleSupplierDetails($details_id) {
        $this->db->where('id',$details_id);
        $query = $this->db->get('supplier');
        return $query->row();
    }

    public function getSuppliersDropdown()
    {
        
        $this->db->where('status',"1");
        $query = $this->db->get('supplier');
            if($query->num_rows()>0)
            {
                foreach($query->result_array() as $row)
                {
                    $data[$row['id']]=$row['supplier_name'];
                }
                return $data;
            }
    }
    public function getSupplierDetails($supplier_id,$lic_name)
    {
        /*$this->db->where('supplier_id', $supplier_id);
        $this->db->order_by('id', 'ASC');*/
        //$query = $this->db->get('supplier2');
        $sql = 'select * from supplier2 where supplier_id ='.$supplier_id ;
        $query =  $this->db->query($sql);
        return $query->getResult();
        

  
    }
    public function getSingleSupplierLicNameDetails($supplier_id,$lic_name,$where_id,$table_name)
    {
         $this->db->where($where_id,$supplier_id);
         $this->db->where('trade_lic_name',$lic_name);
         $query = $this->db->get($table_name);
         return $query->row();
    }
    public function getSupplierAllDetails($supplier_id) {
      /*  $this->db->from('supplier2');
        $this->db->join('supplier', 'supplier2.supplier_id = supplier.id','left');
        $this->db->where('supplier_id',$supplier_id);
        $query = $this->db->get();*/
        $query = $this->db->query('SELECT s2.supplier_id,s1.supplier_name,s1.supplier_email,s1.supplier_contact,s2.trade_lic_name,s2.trade_lic_exp_date,s2.insurance_exp_date,s1.status FROM supplier2 s2 left join supplier s1 on s2.supplier_id=s1.id WHERE s2.supplier_id = '.$supplier_id);
        return $query->result();
/*$this->db->select('s1.supplier_name,s1.supplier_email,s1.supplier_contact,s2.trade_lic_name,s2.trade_lic_exp_date,s2.insurance_exp_date,s1.status ');
$this->db->from('supplier2 s2');
$this->db->join('supplier s1', 's1.id = s2.supplier_id');
$this->db->where('s2.supplier_id', $supplier_id);
$query = $this->db->get();*/
 return $query->result();

       
    }
    public function getSingleSupplier($details_id) {
        $this->db->where('id',$details_id);
        $query = $this->db->get('supplier');
        return $query->result();
    }
     public function getSupplierCount($where_id,$sid,$table_name) {

        $this->db->where($where_id,$sid);
        //$this->db->where('date_work_start <=',date('Y-m-d'));
        $query = $this->db->get('supplier2');
        return $query->num_rows();
    }
    public function deleteSupplier($supplier_id)
    {
         $this->db->where('supplier_id', $supplier_id);
         $this->db->delete('supplier2');
    }
function getLICnames($id,$supplier_id)
    {
        
        $data = array();
       
        if ($this->common->isExists('supplier_id',$supplier_id,'supplier2'))
         {
            
            
            $this->db->where('supplier_id',$supplier_id);
            $query = $this->db->get('supplier2');
            if($query->num_rows()>0)
            {
                foreach($query->result_array() as $row)
                {
                    $data[$row['id']]=$row['trade_lic_name'];
                }
                
            }
         }
         else
         {
            
            $this->db->where('emp_id',$id);

            $query = $this->db->get('employee_details');
            if($query->num_rows()>0)
            {
                foreach($query->result_array() as $row)
                {
                    $data[$row['id']]=$row['trade_lic_name'];
                }
                
            }
         }

               return $data;
       
       
        
    }
}