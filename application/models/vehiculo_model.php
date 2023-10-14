<?php
class Vehiculo_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('*');
        $this->db->from('vehiculo');
        return $this->db->get();
    }

    public function agregar($data)
    {
        $this->db->insert('vehiculo', $data);
    }

    public function obtenerPorId($idVehiculo)
    {
        $this->db->select('*');
        $this->db->from('vehiculo');
        $this->db->where('idVehiculo', $idVehiculo);
        return $this->db->get()->row();
    }

    public function editar($idVehiculo, $data)
    {
        $this->db->where('idVehiculo', $idVehiculo);
        $this->db->update('vehiculo', $data);
    }

    public function eliminar($idVehiculo)
    {
        $this->db->where('idVehiculo', $idVehiculo);
        $this->db->delete('vehiculo');
    }
}
