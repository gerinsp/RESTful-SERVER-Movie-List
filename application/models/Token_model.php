<?php

class Movie_model extends CI_Model
{
    public function getMovie($id = null)
    {
        if($id === null) {
            return $this->db->get('movie')->result_array();
        } else {
            return $this->db->get_where('movie', ['id' => $id])->result_array();
        }
        
    }
}