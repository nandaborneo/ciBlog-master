<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
    public function index()
    {
        $data['title'] = 'Latest Posts';

        $data['posts'] = $this->post_model->get_posts();
        
        $this->load->view('template/header');
        $this->load->view('posts/index', $data);
        $this->load->view('template/footer');

    }

    public function view($slug = null)
    {
        $data['post'] = $this->post_model->get_posts($slug);

        if (empty($data['post'])) {
            show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('template/header');
        $this->load->view('posts/view', $data);
        $this->load->view('template/footer');
    }

}

