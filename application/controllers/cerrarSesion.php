<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CerrarSesion extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->session->sess_destroy();
	}

	public function index(){
        redirect('login', 'refresh');
        $this->cache->clean();
    }
}