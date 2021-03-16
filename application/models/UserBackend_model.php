<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class :  UserBackend_model
 * User model class to get to handle user related data 
 * @author : Sudipto Roy
 * @version : 1.1
 * @since : 04 March 2021
 */
class UserBackend_model extends CI_Model
{

	public function save_new_product($data)
	{
		$isInsert = $this->db->insert('tbl_products', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
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

	public function get_product_details($id)
	{
		$this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->row();
	}

	public function update_product($id, $data)
	{
		$this->db->where('id', $id);
        $is_update = $this->db->update('tbl_products', $data);

        return $is_update;
	}

	public function deselect_image($id, $img)
	{
		$data = $this->get_product_details($id);

        $unserialized_img = unserialize($data->images);

        $new_imgs = array();

        foreach ($unserialized_img as $p_img) {
            if ($p_img != $img) {
                $new_imgs[] = $p_img;
            }
        }
        
        $serialize_img = serialize($new_imgs);

        $p_Info = array('images'=> $serialize_img);

        $this->db->where('id', $id);
        $is_update = $this->db->update('tbl_products', $p_Info);
        
        
        if($is_update == 1){
            return true;
        }else{
            return false;
        }
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

    public function save_product_color($product_id, $color)
    {
        $data_arr = array(
            'product_id' => $product_id,
            'colors' => $color,
        );

        $isInsert = $this->db->insert('tbl_product_colors', $data_arr);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function save_product_images($product_id, $product_color_id, $images)
    {
        $data_arr = array(
            'product_id' => $product_id,
            'product_color_id' => $product_color_id,
            'images' => $images,
        );

        $isInsert = $this->db->insert('tbl_product_imgs', $data_arr);
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