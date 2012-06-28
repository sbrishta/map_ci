
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewExpCI extends CI_Controller {

	public function index()
	{
            $addStr['add'] ="elephant road,dhaka,bangladesh";
            $this->load->view('newExp2',$addStr);

	}

        
}
