<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Url_model');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->helper('url');
        if (isset($_POST['submit'])) {
            $original_url = $this->input->post('original_url');
            $desired_url = $this->input->post('desired_url');
            if (!$this->Url_model->validateUrl($original_url)) {
                $data['valid_error'] = true;
                return $this->load->view('main/index.php', $data);
            }

            if ($desired_url == null || empty($desired_url)) {
                $data['short_url'] = $this->Url_model->storeUrl($original_url);

                return $this->load->view('main/index.php', $data);
            } else {
                $data['short_url'] = $this->Url_model->storeUrl($original_url, $desired_url);

                return $this->load->view('main/index.php', $data);
            }
        }

        return $this->load->view('main/index.php');
    }

    public function redirect($url)
    {
        $original_url = $this->Url_model->getOriginalUrl($url);
        if (!$original_url) {
            show_404();
        } else {
            redirect($original_url[0]['original_url']);
        }
    }
}
