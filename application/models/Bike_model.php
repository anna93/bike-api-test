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

    public function get_bike($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('bike');
        $res = $query->result();
        return $res;
    }

    public function get_all_bikes()
    {
        $query = $this->db->get('bike');
        return $query->result();
    }

    public function create_bike($bike_data)
    {
        //validations
        if(!$bike_data) {
            return array('error' => 'true', 'data' => 'no data to be added' );
        }

        if(!array_key_exists('make',$bike_data) || !array_key_exists('model',$bike_data) || !array_key_exists('owner_name',$bike_data) ) {
            return array('error' => 'true', 'data' => 'malformed data' );
        }

        $query = $this->db->insert('bike',$bike_data);
        if($query) {
            return array('error' => 'false', 'data'=> 'inserted successfully');
        } else {
            return array('error' => 'true', 'data'=> 'some error occurred');
        }
    }

    public function update_bike($bike_data)
    {
        //validations
        if(!$bike_data) {
            return array('error' => 'true', 'data' => 'no data to be added' );
        }

        if(!array_key_exists('id',$bike_data) || (!array_key_exists('make',$bike_data) && !array_key_exists('model',$bike_data) && !array_key_exists('owner_name',$bike_data)) ) {
            return array('error' => 'true', 'data' => 'malformed data' );
        }


        //check if bike exists
        $this->db->where('id', $bike_data['id']);
        $query = $this->db->get('bike');
        $res = $query->result();
        if(count($res) == 0) {
            return array('error' => 'true', 'data'=> 'no such bike found');
        }

        $this->db->where('id', $bike_data['id']);
        $query = $this->db->update('bike', $bike_data);

        if($query) {
            return array('error' => 'false', 'data'=> 'updated successfully');
        } else {
            return array('error' => 'true', 'data'=> 'some error occurred');
        }
    }

    public function delete_bike($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('bike');
    }
}
