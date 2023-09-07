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
				redirect('estudiante/indexlte','refresh'); // se redirecciona a estos paginas 
			}
			else
			{
				redirect('estudiante/invitadolte','refresh');
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















	public function indexlte()
	{

		$lista=$this->estudiante_model->listaestudianteslte();
		$data['estudiantes']=$lista;

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_listalte', $data);
		$this->load->view('inclte/pie'); 
	}

	public function agregar()
	{
		//mostrar un formulario(vista) para agregar nuevo estudiante
		$this->load->view('inc/cabecera');
		$this->load->view('inc/menu');
		$this->load->view('est_formulario');
		$this->load->view('inc/pie');
	}

	public function agregarlte()
	{
		//mostrar un formulario(vista) para agregar nuevo estudiante

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_formulariolte'); //, $data
		$this->load->view('inclte/pie');

	}

	public function agregarbd()
	{
		//atrib. BD             atrib. formulario
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['nota']=$_POST['nota'];

		$this->estudiante_model->agregarestudiante($data);

		redirect('estudiante/index','refresh');
	}

	public function agregarbdlte()
	{
		//atrib. BD             atrib. formulario
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['nota']=$_POST['nota'];

		$this->estudiante_model->agregarestudiantelte($data);

		redirect('estudiante/indexlte','refresh');
	}

	public function eliminarbd()
	{
		//
		$idestudiante=$_POST['idestudiante'];
		$this->estudiante_model->eliminarestudiante($idestudiante);
		redirect('estudiante/index','refresh');
	}

	public function eliminarbdlte()
	{
		//
		$idestudiante=$_POST['idestudiante'];
		$this->estudiante_model->eliminarestudiantelte($idestudiante);
		redirect('estudiante/indexlte','refresh');
	}

	public function modificar()
	{
		//recepcion que esta llegando desde el boton modificar
		$idestudiante=$_POST['idestudiante'];
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idestudiante);
		
		$this->load->view('inc/cabecera');
		$this->load->view('inc/menu');
		$this->load->view('est_modificar',$data);
		$this->load->view('inc/pie');
	}

	public function modificarlte()
	{
		//recepcion que esta llegando desde el boton modificar
		$idestudiante=$_POST['idestudiante'];
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiantelte($idestudiante);

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_modificarlte', $data); //
		$this->load->view('inclte/pie');
	
	}

	public function modificarbd()
	{
		$idestudiante=$_POST['idestudiante'];

		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['nota']=$_POST['nota'];

		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/index','refresh');
	}

	public function modificarbdlte()
	{
		$idestudiante=$_POST['idestudiante'];

		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['nota']=$_POST['nota'];

		$this->estudiante_model->modificarestudiantelte($idestudiante,$data);
		redirect('estudiante/indexlte','refresh');
	}

	public function deshabilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='0';

		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/index','refresh');
	}

	public function deshabilitarbdlte()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='0';

		$this->estudiante_model->modificarestudiantelte($idestudiante,$data);
		redirect('estudiante/indexlte','refresh');
	}

	public function habilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='1';

		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/deshabilitados','refresh');
	}

	public function habilitarbdlte()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='1';

		$this->estudiante_model->modificarestudiantelte($idestudiante,$data);
		redirect('estudiante/deshabilitadoslte','refresh');
	}

	public function deshabilitados()
	{

		$lista=$this->estudiante_model->listaestudiantesdes();
		$data['estudiantes']=$lista;

		$this->load->view('inc/cabecera');
		$this->load->view('inc/menu');
		$this->load->view('est_listades',$data);
		$this->load->view('inc/pie'); 
	}

	

	public function deshabilitadoslte()
	{

		$lista=$this->estudiante_model->listaestudiantesdeslte();
		$data['estudiantes']=$lista;

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_listadeslte', $data); //
		$this->load->view('inclte/pie');	
	}

	
/*
    // http://localhost:9094/web2/Proyecto/index.php/base/prod
    public function prod() 
	{
		
		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista;

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
		$query=$this->db->get('estudiantes');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
*/
}
