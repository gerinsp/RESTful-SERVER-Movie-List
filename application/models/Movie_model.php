<?php

use GuzzleHttp\Client;

class Movie_model extends CI_Model
{
    public function getMovie($id = null)
    {
        if($id === null) {
            return $this->db->get('movie')->result_array();
        } else {
            return $this->db->get_where('movie', ['id' => $id])->result_array();
        }
        // $client = new Client();

        // $response = $client->request('GET', 'http://omdbapi.com', [
        //     'qeuery' => [
        //         'apikey' => 'c870dea9',
        //         's' => $id
        //     ]
        // ]);
        
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['search'];
    }

    public function deleteMovie($id)
    {
        $this->db->delete('movie', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMovie($data)
    {
        $this->db->insert('movie', $data);
        return  $this->db->affected_rows();
    }

    public function updateMovie($data, $id)
    {
        $this->db->update('movie', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}