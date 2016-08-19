<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Bike_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getBike($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('bike');
        $res = $query->result();
        return $res;
    }

    public function getAllBikes()
    {
        $query = $this->db->get('bike');
        return $query->result();
    }
}
