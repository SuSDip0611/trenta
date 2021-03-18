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

    public function delete_product_color($product_id, $id)
    {
        $delete_query = $this->db->delete('tbl_product_colors', array('id' => $id, 'product_id' => $product_id));

        if($delete_query == 1){
            return true;      
        }else{
            return false;
        }
    }

    public function delete_product_color_images($id, $product_id, $product_color_id)
    {
        $delete_query = $this->db->delete('tbl_product_imgs', array('id' => $id, 'product_id' => $product_id, 'product_color_id' => $product_color_id));

        if($delete_query == 1){
            return true;      
        }else{
            return false;
        }
    }

    public function delete_product_sizes($id, $product_id, $product_color_id)
    {
        $delete_query = $this->db->delete('tbl_product_size', array('id' => $id, 'product_id' => $product_id, 'product_color' => $product_color_id));

        if($delete_query == 1){
            return true;      
        }else{
            return false;
        }
    }

	public function update_product($id, $data)
	{
		$this->db->where('id', $id);
        $is_update = $this->db->update('tbl_products', $data);

        return $is_update;
	}

    public function update_product_color($product_id, $color_id, $color)
    {
        $data = array(
            'colors' => $color
        );

        $this->db->where('id', $color_id);
        $this->db->where('product_id', $product_id);
        $is_update = $this->db->update('tbl_product_colors', $data);

        return $is_update;
    }

    public function update_product_images($product_id, $color_id, $image_id, $images)
    {
        $old_images = $this->get_color_images($product_color_id, $product_id);

        $unserialize_old_images = unserialize($old_images);

        $new_imgs = serialize(array_merge($unserialize_old_images, $images));

        $data = array(
            'images' => $new_imgs
        );

        $this->db->where('id', $image_id);
        $this->db->where('product_id', $product_id);
        $this->db->where('product_color_id', $color_id);
        $is_update = $this->db->update('tbl_product_imgs', $data);

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
        // echo "<pre>";
        // print_r($insert_id);
        // echo "</pre>";
        // exit();

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

    public function save_product_size($product_id, $product_color_id, $size)
    {
        $data_arr = array(
            'product_id' => $product_id,
            'product_color' => $product_color_id,
            'size' => $size,
        );

        $isInsert = $this->db->insert('tbl_product_size', $data_arr);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    
    public function update_product_size($product_id, $product_color_id, $size_id, $size)
    {
        $data = array(
            'size' => $size
        );

        $this->db->where('id', $size_id);
        $this->db->where('product_id', $product_id);
        $this->db->where('product_color', $product_color_id);
        $is_update = $this->db->update('tbl_product_size', $data);

        return $is_update;
    }

    public function get_colors($product_id)
    {
        $this->db
            ->select('*')
            ->from('tbl_product_colors')
        ->where('product_id', $product_id);
        $query = $this->db->get(); 
        
        return $query->result();
    }
    
    public function get_color_images( $color_id, $product_id)
    {
        $this->db
            ->select('*')
            ->from('tbl_product_imgs')
        ->where('product_id', $product_id)
        ->where('product_color_id', $color_id);
        $query = $this->db->get(); 
        
        return $query->row();
    }

    public function get_product_sizes($color_id, $product_id)
    {
        $this->db
            ->select('*')
            ->from('tbl_product_size')
        ->where('product_id', $product_id)
        ->where('product_color', $color_id);
        $query = $this->db->get(); 
        
        return $query->row();
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