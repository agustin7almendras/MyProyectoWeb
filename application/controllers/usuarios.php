<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP

//EL CONTROLADOR EN REALIDAD VA A SER CLASES
//TAL COMO SE LLAMA MI ARCHIVO SE DEBE LLAMAR LA CLASE ejm. class Welcome y el archivo .php se llama Welcome.php
//El nombre de la clase siempre debe ser MAYUSCULA


//TENEMOS LA ARQUITECTURA DE UNA MODELO DE CLASE EN PHP
class Usuarios extends CI_Controller { //ESTO ES HERERNCIA, ACCEDEMOS A NUESTRO CONTROLADOR Welcome.php

    //aqui verificamos si el usuario a iniciado session 
	public function index()
	{
		

		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			redirect('usuarios/panel','refresh');// si exite va a la pagina usuarios panel 
		}
		else
		{
			$data['msg']=$this->uri->segment(3);
			$this->load->view('login',$data);
		}

	}

	public function validarusuario()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if($consulta->num_rows()>0) //usuario correctamente validado
		{
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('idusuario',$row->idUsuario);
				$this->session->set_userdata('login',$row->login);
				$this->session->set_userdata('tipo',$row->tipo);
				redirect('usuarios/panel','refresh');
			}			
		}
		else
		{
			redirect('usuarios/index/1','refresh');
		}
	}

	public function panel()
	{
		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			$tipo=$this->session->userdata('tipo');// se obteiene de otro valor llamado tipo
			if($tipo=='admin')// si tip es igual a admin
			{
				redirect('conductor/indexlte','refresh'); // se redirecciona a estos paginas 
			}
			else
			{
				redirect('conductor/invitadolte','refresh');
			}
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();//limpian cerrando session
		redirect('usuarios/index/3','refresh');
	}















	

	


	

	

	

	

	

	

	

	

	

	

	

	
/*
    // http://localhost:9094/web2/Proyecto/index.php/base/prod
    public function prod() 
	{
		
		$lista=$this->estudiante_model->listaestudiantes();
		$data['conductor']=$lista;

		$this->load->view('inc/cabecera');
		$this->load->view('inc/menu');
		$this->load->view('productos', $data);
		$this->load->view('inc/pie');
	}

    // http://localhost:9094/web2/Proyecto/index.php/base/cont
    public function cont()
	{
		$this->load->view('inc/cabecera');
		$this->load->view('inc/menu');
		$this->load->view('contactos');
		$this->load->view('inc/pie');
	}

	public function pruebabd()
	{
		$query=$this->db->get('conductor');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
*/
}
