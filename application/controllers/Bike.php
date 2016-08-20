<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 *
 */
class Bike extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('bike_model');
    }

    public function bike_get($id=null)
    {
        if($id == null) { // get all bikes
            $bike = $this->bike_model->get_all_bikes();
            $code = 200;
        } else {
            $bike = $this->bike_model->get_bike($id);
            $code = 200;
            if(count($bike) == 0) {
                $code = 404;
                $bike = 'bike not found';
            }
        }

        return $this->response($bike,$code);
    }

    public function bike_post()
    {
        $bike_data = $this->post('bike');
        $bike_data = json_decode($bike_data, true);

        $ret_data = $this->bike_model->create_bike($bike_data);
        $this->response($ret_data);
    }

    public function bike_put()
    {
        $bike_data = $this->put('bike');
        $bike_data = json_decode($bike_data, true);

        $ret_data = $this->bike_model->update_bike($bike_data);
        $this->response($ret_data);
    }

    public function bike_delete($id)
    {
        if($id == null) {
            $this->response([],404);
        } else {
            $this->bike_model->delete_bike($id);
            $this->response("bike: $id deleted successfully");
        }
    }

}
