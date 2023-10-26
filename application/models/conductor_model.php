<?php 
// este modelo interactua directamente con base de datos 
   class conductor_model extends CI_Model
    {
        public function listaprincipal()//MUESTRA TODOS LA LISTA PRINCIPAL
        {
            $this->db->select('*');
            $this->db->from('conductor');// estudiantes la tabla 
            $this->db->where('habilitado','1');
            return $this->db->get();
        }

        
        public function listaConductores()// metodo consulta que muestra todo
        {
            $this->db->select('*');
            $this->db->from('conductor');
            $this->db->where('habilitado','1');
            return $this->db->get();
        }

        public function listaConductoresDeshabilitados()//consulta deshabilitados
        {
            $this->db->select('*');
            $this->db->from('conductor');
            $this->db->where('habilitado','0');
            return $this->db->get();
        }

        public function agregarconductor($data)
        {
            //insercion mvc
            $this->db->insert('conductor',$data);

        }

        public function eliminarconductor($idconductor)
        {
            //borrado mvc hard delete
            $this->db->where('idConductor',$idconductor);
            $this->db->delete('conductor');
        }

        public function recuperarconductor($idconductor)
        {
            $this->db->select('*');
            $this->db->from('conductor');
            $this->db->where('idConductor',$idconductor);
            return $this->db->get();
        }

        public function modificarconductor($idconductor,$data)
        {
            $this->db->where('idConductor',$idconductor);
            $this->db->update('conductor',$data);
        }

    }
