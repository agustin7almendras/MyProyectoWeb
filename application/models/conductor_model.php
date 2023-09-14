<?php 
// este modelo interactua directamente con base de datos 
   class conductor_model extends CI_Model
    {
        public function listaprincipal()//MUESTRA TODOS LA LISTA PRINCIPAL
        {
            $this->db->select('*');
            $this->db->from('conductortbl');// estudiantes la tabla 
            $this->db->where('habilitado','1');
            return $this->db->get();
        }

        
        public function listaestudianteslte()
        {
            $this->db->select('*');
            $this->db->from('conductortbl');
            $this->db->where('habilitado','1');
            return $this->db->get();
        }

        public function listaestudiantesdeslte()
        {
            $this->db->select('*');
            $this->db->from('conductortbl');
            $this->db->where('habilitado','0');
            return $this->db->get();
        }

        public function agregarestudiantelte($data)
        {
            //insercion mvc
            $this->db->insert('conductortbl',$data);

        }

        public function eliminarestudiantelte($idestudiante)
        {
            //borrado mvc hard delete
            $this->db->where('idEstudiante',$idestudiante);
            $this->db->delete('conductortbl');
        }

        public function recuperarestudiantelte($idestudiante)
        {
            $this->db->select('*');
            $this->db->from('conductortbl');
            $this->db->where('idEstudiante',$idestudiante);
            return $this->db->get();
        }

        public function modificarestudiantelte($idestudiante,$data)
        {
            $this->db->where('idEstudiante',$idestudiante);
            $this->db->update('conductortbl',$data);
        }

    }
