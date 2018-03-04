<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->database();
        echo json_encode($this->getLastPagination());
	}

	public function get_recent(){
        $this->load->database();
        echo json_encode($this->getLastPagination());
    }
    function getLastPagination(){

        $query ="select * from data order by id DESC limit 1";

        $res = $this->db->query($query);

        if($res->num_rows() > 0) {
            return $res->result("array");
        }
        return array();
    }

}
