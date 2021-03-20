<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class :  UserFrontend_model
 * User model class to get to handle user related data 
 * @author : Sudipto Roy
 * @version : 1.1
 * @since : 04 March 2021
 */
class UserFrontend_model extends CI_Model
{
    public function get_category_products($cat_id)
    {
        $is_deleted = 0;
        $this->db
            ->select('*')
            ->from('tbl_products')
            ->where('category', $cat_id)
            ->where('is_deleted', $is_deleted)
            ->limit(8)
        ->order_by('id', 'DESC');
        $query = $this->db->get(); 
        
        return $query->result();
    }

    public function getAllCategory()
    {
        // $query = $this->db->get_where('tbl_categories', array('is_deleted' => '0'));
        $this->db->select("*");
        $this->db->from("tbl_categories");
        $this->db->where(array('is_deleted' => '0'));
        $this->db->order_by("id", "desc");
        $query = $this->db->get();  


        if($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_product_all_sizes($product_id='', $color_id)
    {
        $this->db
            ->select('size')
            ->from('tbl_product_size')
            ->where('product_id', $product_id)
        ->where('product_color !=', $color_id);
        $query = $this->db->get(); 
        
        return $query->result();
    }
    
    public function get_product_imgs($product_id='')
    {
        $this->db
            ->select('*')
            ->from('tbl_product_imgs')
        ->where('product_id', $product_id);
        $query = $this->db->get(); 
        
        return $query->row();
    }

    public function get_product_imgs_by_color($product_id='', $color_id='')
    {
        $this->db
            ->select('images')
            ->from('tbl_product_imgs')
            ->where('product_id', $product_id)
        ->where('product_color_id', $color_id);
        $query = $this->db->get(); 
        
        return $query->row();
    }
    
    public function get_product_sizes_by_color($product_id='', $color_id='')
    {
        $this->db
            ->select('size')
            ->from('tbl_product_size')
            ->where('product_id', $product_id)
        ->where('product_color', $color_id);
        $query = $this->db->get(); 
        
        return $query->row();
    }

    // public function getAllProductBycategory($catId)
    // {
    //     // $query = $this->db->
    //     $this->db->select("*");
    //     $this->db->from("tbl_products");
    //     $this->db->where(array('is_deleted' => '0', 'category' => $catId));
    //     $this->db->order_by("id", "desc");
    //     $query = $this->db->get();

    //     if($query->num_rows() > 0) {
    //         return $query->result();
    //     }else{
    //         return false;
    //     }
    // }

}