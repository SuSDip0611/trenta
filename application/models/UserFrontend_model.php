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

        // echo "<pre>";
        // print_r($cat_id);
        // echo "</pre>";
        // exit();

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

}