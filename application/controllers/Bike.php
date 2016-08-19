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
            $bike = $this->bike_model->getAllBikes();
            $code = 200;
        } else {
            $bike = $this->bike_model->getBike($id);
            $code = 200;
            if(count($bike) == 0) {
                $code = 404;
            }
        }

        return $this->response($bike,$code);
    }

    public function bike_post()
    {
        echo 2;
    }

    public function bike_put()
    {
        echo 3;
    }

    public function bike_delete()
    {
        echo 4;
    }

}
