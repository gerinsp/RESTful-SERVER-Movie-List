<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Movie extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Movie_model', 'movie');

        $this->methods['index_get']['limit'] = 40;
        $this->methods['index_delete']['limit'] = 30;
        $this->methods['index_post']['limit'] = 30;
        $this->methods['index_put']['limit'] = 30;
    }
    
    public function index_get()
    { 
        $id = $this->get('id');
        if($id === null){
            $movie = $this->movie->getMovie(); 
        } else {
            $movie = $this->movie->getMovie($id);
        }
        
        if($movie){
            $this->response([
                'status' => true,
                'data' => $movie
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this-delete('id');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if($this->movie->deleteMovie($id) > 0){
                $this->response([
                    'status' => true,
                    'data' => $id,
                    'message' => 'data is deleted!'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'judul' => $this->post('judul'),
            'tahun_rilis' => $this->post('tahun_rilis'),
            'director' => $this->post('director'),
            'plot' => $this->post('plot')
        ];

        if($this->movie->createMovie($data) >0){
            $this->response([
                'status' => true,
                'message' => 'new movie has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'judul' => $this->post('judul'),
            'tahun_rilis' => $this->post('tahun_rilis'),
            'director' => $this->post('director'),
            'plot' => $this->post('plot')
        ];
        if($this->movie->updateMovie($data, $id) >0){
            $this->response([
                'status' => true,
                'message' => 'data movie has been updated.'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to uptade data!'
            ], REST_Controller::HTTP_BAD_REQEST);
        }
    }
    
}