<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_controller{
        
        public function index()
        {
            
            $this->load->view('recursos/login/header');
            $this->load->view('login/iniciar_sesion');
            $this->load->view('recursos/footer');
            
            
            //redirect('Principal/registrar_trabajo');
        }
        
        /*public function iniciar_sesion()
        {
            $usuario=$this->input->post('usuario');
            $contra=$this->input->post('pass');
            
            $this->load->model('Login_m');
            $array_user=$this->Login_m->iniciar_sesion($usuario, $contra);
            if (count($array_user)>0)
            {
                $this->session->set_userdata('usuario',$array_user[0]->id);
                $this->session->set_userdata('nombre',$array_user[0]->nombre);
                redirect('Usuario');
            }
            else
            {
                redirect('Login');
            }
        }*/
        
        public function iniciar_sesion($output)
        {
            //$datos_usuario=json_decode($output,TRUE); // lo convierte en un array
            $datos_usuario=json_decode($output); // lo convierte en un objeto
            
            if (count($datos_usuario)>0)
            {
                $this->session->set_userdata('usuario',$datos_usuario[0]->USUARIOID);
                $this->session->set_userdata('nombre',$datos_usuario[0]->NOMBRE);
                
                if ($this->es_admin($datos_usuario[0]->GRUPOSAD)==true)
                {
                    // escribir aquí lo que se hará si es administrador
                    
                    $this->session->set_userdata('admin',1);

                    //redirect('Administrador');
                }
                
                redirect('Principal');
            }
            redirect('Login');
            //var_dump($_SESSION);
        }
        
        public function validar_usuario()
        {
            $usuario=$this->input->post('usuario');
            $contrasena=$this->input->post('contrasena');
            
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "http://vadaexterno:8080/wsAutEmp/Service1.asmx/Valida_Usuario");
            curl_setopt($ch, CURLOPT_POST, 1); //se puede comentar y de todos modos jala
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,"usuario=$usuario&contrasena=$contrasena");
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$output = curl_exec($ch); // la variable output contiene el json raw
            
            $this->iniciar_sesion($output);
            
            //$data=json_decode($output,TRUE); // lo convierte en un array
            //$data=json_decode($output); // lo convierte en un objeto
            
        }
        
        public function es_admin($cadena) // determina si el usuario es administrador
        {
            $array=explode(",",$cadena);
            $admin=false;
            
            foreach ($array as $a)
            {
                if ($a=='GG_BITCORA_ADMIN')
                {
                    $admin=true;
                }
            }
            
            return $admin;
        }
        
        public function cerrar_sesion()
        {
            $this->session->sess_destroy();
            redirect('Login');
        }

        public function get_puesto()
        {
            $usuario=$this->input->post('usuario');

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "http://vadaexterno:8080/wsAutEmp/Service1.asmx/Valida_Usuario");
            curl_setopt($ch, CURLOPT_POST, 1); //se puede comentar y de todos modos jala
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,"usuario=$usuario&contrasena=");
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$output = curl_exec($ch); // la variable output contiene el json raw

            $arrEmpleado = json_decode($output);
            $puesto = empty($arrEmpleado) ? 'Usuario no encontrado' : $arrEmpleado[0]->PUESTO;
            echo json_encode($puesto);
        }
    }
?>