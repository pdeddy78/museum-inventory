<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($username, $password)
    {
        $this->db->from('TMUser');
        $this->db->where('username = ' . "'" . $username . "'"); 
        $this->db->where('password = ' . "'" . $password . "'");
        $this->db->limit(1);

        $query = $this->db->get();

        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function password()
    {

        $id_user   = $this->session->userdata('id');
        $password  = sha1($this->config->item('salt') . $this->input->post('new_password'));
        
        // update db
        $this->db->set('password', $password);
        $this->db->where('id_user', $id_user);
        $this->db->update('TMUser');

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


}