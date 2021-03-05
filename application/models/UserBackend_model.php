<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class :  UserBackend_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class UserBackend_model extends CI_Model
{

	public function save_new_product($data)
	{
		$isInsert = $this->db->insert('tbl_products', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
	}

	public function update_new_product($id, $imgs)
	{
		$this->db->where('id', $id);
        $is_update = $this->db->update('tbl_products', $imgs);

        return $is_update;
	}

	public function get_product_list()
	{
		$is_deleted = 0;

        $this->db
        ->select('*')
        ->from('tbl_products')
        ->where('is_deleted', $is_deleted)
        ->order_by('id', 'DESC');
        $query = $this->db->get(); 
        
        return $query->result();
	}

	public function delete_product($id, $data)
	{
		$this->db->where('id', $id);
        $is_update = $this->db->update('tbl_products', $data);

        
        return $is_update;
	}

	public function save_new_category($data)
	{
		$isInsert = $this->db->insert('tbl_categories', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
	}

	public function get_category_list()
	{
		$is_deleted = 0;

        $this->db
        ->select('*')
        ->from('tbl_categories')
        ->where('is_deleted', $is_deleted)
        ->order_by('id', 'DESC');
        $query = $this->db->get(); 
        
        return $query->result();
	}

	public function get_category_details($id)
	{
		$this->db->select('*');
        $this->db->from('tbl_categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
	}

	public function update_category($id, $data)
	{
		$this->db->where('id', $id);
        $is_update = $this->db->update('tbl_categories', $data);

        
        return $is_update;
	}

	public function delete_category($id, $data)
	{
		$this->db->where('id', $id);
        $is_update = $this->db->update('tbl_categories', $data);

        
        return $is_update;
	}



}