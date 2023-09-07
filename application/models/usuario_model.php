<?php 
    // este modelo es para usuario en base de datos 
    class Usuario_model extends CI_Model
    {
        public function validar($login,$password) //este metodo validara a los usuarios del sistema
        {
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('login',$login);
            $this->db->where('password',$password);
            return $this->db->get();
        }

    }