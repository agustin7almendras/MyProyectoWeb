<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP

//EL CONTROLADOR EN REALIDAD VA A SER CLASES
//TAL COMO SE LLAMA MI ARCHIVO SE DEBE LLAMAR LA CLASE ejm. class Welcome y el archivo .php se llama Welcome.php
//El nombre de la clase siempre debe ser MAYUSCULA


//TENEMOS LA ARQUITECTURA DE UNA MODELO DE CLASE EN PHP
class Conductor extends CI_Controller { //ESTO ES HERERNCIA, ACCEDEMOS A NUESTRO CONTROLADOR Welcome.php


	public function indexlte() // CARGA DE indexlte
	{
		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			//redirect('estudiante/indexlte','refresh');
			$lista=$this->conductor_model->listaprincipal();// aqui esta la consulta de BD
			$data['guardame']=$lista;// ESTAMOS CARGANOD TOD ESE LISTA 

			$this->load->view('inclte/cabecera'); //CARGA LA CABECERA DE LA CARPETA inclte
			$this->load->view('inclte/menusuperior');
			$this->load->view('inclte/menulateral');// caraga menu lateral 
			$this->load->view('est_listalte', $data);
			$this->load->view('inclte/pie');
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}
     //DISEÑO DE REPORTE DE PDF DE BANCO BISA 
	public function listapdf()
	{
		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			//redirect('estudiante/indexlte','refresh');
			$lista=$this->conductor_model->listaprincipal(); //este pdf recibe de estudiante_model y trae metodo listaPrincipal
			$lista=$lista->result();
			
			$this->pdf=new Pdf(); //se crea el objeto para poder invocar todos los elementos de la libreria pdf
			$this->pdf->AddPage();//se crea la pagina
			$this->pdf->AliasNbPages(1); //Enumeracion de pagina
			$this->pdf->settitle("Reporte Banco Bisa");//Titulo de la  PESTANIA
			
			//Personalizacion del reporte (PARECIDO A CSS)

			$ruta=base_url()."img/logo.jpg";
			// importar imagenes
			$this->pdf->Image($ruta,10,20,50,25);//-> coordenadas y medidas (x,y,ancho,alto)+
			$this->pdf->Ln(20); //salto de linea de 5 puntos

			$this->pdf->Cell(145);
			$this->pdf->SetTextColor(7,4,66);
			$this->pdf->SetFillColor(255,255,255);
			$this->pdf->SetFont('Arial','B',12); 

			$this->pdf->Cell(40,8,'ESTADO DE CUENTA',0,'C',1);
			$this->pdf->Ln(10); //salto de linea de 5 puntos
			

			$this->pdf->SetFont('Arial','B',11); 
			$this->pdf->SetFillColor(239,209,39);
			$this->pdf->Cell(90,5,'MENDEZ MENDEZ LUIS ALBERTO',0,0,'L',1); //Celda 120x10 con titulo LISTA DE ESTUDIANTES:			

			//$this->pdf->SetLeftMargin(5); //margenes
			//$this->pdf->SetRightMargin(5);//margenes
			$this->pdf->SetFillColor(239,209,39); //rgb, coloracion rgb, de aca para abajo tendran todas las celdas este tono.
			$this->pdf->SetFont('Arial','B',11); //tipo de letra: tipo, negrilla, tamanio I = italic, U = underline, B = bold, vacio = normal

			//Ahora vamos a cambiar el tipo de letra:
			$this->pdf->Ln(10);
			$this->pdf->SetFont('Arial','B',8);//de aqui para abajo se cambia el nombre
			
			//CELDA
			$this->pdf->SetFillColor(7,4,66);
			$this->pdf->SetTextColor(255,255,255);
			$this->pdf->SetFont('Arial','B',9);
			$this->pdf->Cell(40,8,'PERIODO DEL ESTADO','TBLR',0,'C',1);
			$this->pdf->Cell(30); 	
			$this->pdf->Cell(40,8,'SALDO FINAL','TBLR',0,'C',1); 
			$this->pdf->Cell(30); 	
			$this->pdf->SetFillColor(255,255,255);
			$this->pdf->SetTextColor(7,4,66);

			$this->pdf->Cell(25,8,'Saldo Prom:','TLR',0,'C',1);
			$this->pdf->Cell(25,8,'3.501,44','TLR',0,'C',1); 


			$this->pdf->Ln(8); 
			$this->pdf->Cell(40,8,'Julio 2023','TBLR',0,'C',1); 
			$this->pdf->Cell(30);
			$this->pdf->Cell(40,8,'5.020,12','TBLR',0,'C',1); 
			$this->pdf->Cell(30);
			$this->pdf->Cell(25,8,'*TEP:','BLR',0,'C',1); 
			$this->pdf->Cell(25,8,'0,00000','BLR',0,'C',1); 
			
			//TERCERA PARTE
			$this->pdf->Ln(13);
			$this->pdf->SetFillColor(239,209,39); 
			$this->pdf->SetFont('Arial','B',8);
			$this->pdf->Cell(31.69,5,'Saldo Inicial','TBLR',0,'C',1);
			$this->pdf->Cell(31.69,5,'Depositos/Creditos','TBLR',0,'C',1); 

			$this->pdf->Cell(31.69,5,'Retiros/Debitos','TBLR',0,'C',1);
			$this->pdf->Cell(31.69,5,'Cargos por Servicios','TBLR',0,'C',1); 

			$this->pdf->Cell(31.69,5,'Interes Pagado','TBLR',0,'C',1);
			$this->pdf->Cell(31.69,5,'Interes Cobrado','TBLR',0,'C',1); 

			$this->pdf->Ln(5);
			$this->pdf->SetFillColor(255,255,255);
			$this->pdf->Cell(31.69,5,'4.322,81','TBLR',0,'C',1);
			$this->pdf->Cell(31.69,5,'1.269,07','TBLR',0,'C',1); 

			$this->pdf->Cell(31.69,5,'59.14','TBLR',0,'C',1);
			$this->pdf->Cell(31.69,5,'1,04','TBLR',0,'C',1); 

			$this->pdf->Cell(31.69,5,'8,00','TBLR',0,'C',1);
			$this->pdf->Cell(31.69,5,'0,00','TBLR',0,'C',1); 

			//CELDAFIN

			$this->pdf->SetFont('Arial','',9);//de aqui para abajo se cambia el nombre
			
			

			$this->pdf->Output("listaestudiantes.pdf","I");

			//I = mostrar en navegador
			//D = forzar descarga
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}
	
    // METODO PARA SUBIR FOTO
	public function subirfoto()
	{
		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			//redirect('estudiante/indexlte','refresh');
			
			$data['idConductor']=$_POST['idconductor'];

			$this->load->view('inclte/cabecera');
			$this->load->view('inclte/menusuperior');
			$this->load->view('inclte/menulateral');
			$this->load->view('subirform', $data);
			$this->load->view('inclte/pie');
		}
		else
		{
			redirect('conductor/index','refresh');
		}
	}

	/*public function subir()
	{
		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			//redirect('conductor/indexlte','refresh');
			
			$idconductor=$_POST['idConductor'];
			$nombrearchivo=$idconductor.".jpg";
			
			$config['upload_path']='./uploads/fotosconductores/';
			$config['file_name']=$nombrearchivo;
			$direccion="./uploads/fotosconductores/".$nombrearchivo;

			if (file_exists($direccion)) 
			{
				unlink($direccion);
			}
			
			$config['allowed_types']='jpg|gif|png';
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload()) 
			{
				$data['error']=$this->upload->display_errors();
			}
			else
			{
				$data['foto']=$nombrearchivo;
				$this->conductor_model->modificarestudiante($idconductor,$data);
				$this->upload->data();
			}
			redirect('conductor/indexlte','refresh');

		}
		else
		{
			redirect('conductor/index','refresh');
		}
	}
	*/

	public function invitadolte()
	{
		if ($this->session->userdata('login'))//controlar si existe la variable de session login 
		{
			$this->load->view('inclte/cabecera');
			$this->load->view('inclte/menusuperior');
			$this->load->view('inclte/menulateral');
			$this->load->view('est_invitado');
			$this->load->view('inclte/pie');
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}

	public function agregarlte()
	{
		//mostrar un formulario(vista) para agregar nuevo conductor 

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_formulariolte'); //CARGA EL FORMULARIO PARA AGREGAR NUEVO CONDUCTOR 
		$this->load->view('inclte/pie');

	}


	public function agregarbdlte() // AGREGA MEDIENTE LTE
	{
		
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['telefono']=$_POST['telefono'];
		$data['numLicencia']=$_POST['numLicencia'];
		

		$this->conductor_model->agregarconductor($data);

		redirect('conductor/indexlte','refresh');
	}

	public function eliminarbdlte()
	{
		//
		$idconductor=$_POST['idconductor'];
		$this->conductor_model->eliminarestudiantelte($idconductor);
		redirect('conductor/indexlte','refresh');
	}

	public function modificarlte()
	{
		//recepcion que esta llegando desde el boton modificar
		$idconductor=$_POST['idconductor'];
		$data['infoestudiante']=$this->conductor_model->recuperarestudiantelte($idconductor);

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_modificarlte', $data); //
		$this->load->view('inclte/pie');
	
	}
	public function modificarbdlte()
	{
		$idconductor=$_POST['idconductor'];

		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];
		$data['telefono']=$_POST['telefono'];
		$data['numLicencia']=$_POST['numLicencia'];

		$this->conductor_model->modificarestudiantelte($idconductor,$data);
		redirect('conductor/indexlte','refresh');
	}
	public function deshabilitarbdlte()
	{
		$idconductor=$_POST['idconductor'];
		$data['habilitado']='0';

		$this->conductor_model->modificarestudiantelte($idconductor,$data);
		redirect('conductor/indexlte','refresh');
	}

	
	public function habilitarbdlte()
	{
		$idconductor=$_POST['idconductor'];
		$data['habilitado']='1';

		$this->conductor_model->modificarestudiantelte($idconductor,$data);
		redirect('conductor/deshabilitadoslte','refresh');
	}

	public function deshabilitadoslte()//METODO QUE CARGA deshabilitadoslte
	{

		$lista=$this->conductor_model->listaestudiantesdeslte();
		$data['conductortbl']=$lista;

		$this->load->view('inclte/cabecera');
		$this->load->view('inclte/menusuperior');
		$this->load->view('inclte/menulateral');
		$this->load->view('est_listadeslte', $data); //TE LLEVA A FORMULAROIO DE LISTA DESABILITADO 
		$this->load->view('inclte/pie');
	}


}
