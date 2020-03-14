<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $dados['header'] = false;
        $dados['controllerName'] = $this->uri->segment(1);

        $this->load->helper(array('file', 'html'));

        $files = get_dir_file_info(APPPATH . 'controllers', FALSE);
        sort($files);
        $dados['files'] = $files;

        $this->load->view('home/header', $dados);
        //$this->load->view('home/indexcontent');

        //$this->load->view($dados['controllerName'] . '/' . $dados['controllerName'], $dados);
        
        //$this->load->view('home/footer', $dados);
    }

    public function telas() {
        echo "telas";
    }

}
