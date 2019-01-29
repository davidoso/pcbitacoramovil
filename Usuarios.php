<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Usuarios extends CI_controller{
       
        public function index()
        {
        }
        public function get_usuarios()
        {
            $this->load->model('Usuarios_m');
            $ids=$this->input->get('id');
            $correo=$this->input->get('correo');
            $contra=$this->input->get('contra');
            if (empty($correo) && empty($contra) && empty($ids)) 
            {
                //$array=array('get_usuarios_all'=>$this->Usuarios_m->get_usuarios_all());
                $array=$this->Usuarios_m->get_usuarios_all();
                $retorno = ['items'=>$array];
            }
            else
            {
                if (empty($contra) && empty($correo)) 
                {
                    $array=$this->Usuarios_m->get_usuarios_id($ids);
                    $retorno = ['items'=>$array];
                }
                else
                {
                    if (empty($contra)) 
                    {
                        //$array=array('get_usuario'=>$this->Usuarios_m->get_usuario($correo));
                        $array=$this->Usuarios_m->get_usuarios($correo);
                        $retorno = ['items'=>$array];
                    }
                    else
                    {
                        //$array=array('get_usuarios_one'=>$this->Usuarios_m->get_usuarios_one($correo,$contra));
                        $array=$this->Usuarios_m->get_usuarios_one($correo,$contra);
                        $retorno = ['items'=>$array];
                    }
                }
            }
            echo json_encode($retorno);
        }

        public function insert_usuarios()
        {
            $this->load->model('Usuarios_m');
            $correo=$this->input->post('correo');
            $contraseña=$this->input->post('contraseña');
            $usuario=$this->input->post('usuario');
            $alias=$this->input->post('alias');
            $fecha_nacimiento=$this->input->post('fecha_nacimiento');
            $genero=$this->input->post('genero');

            $array=$this->Usuarios_m->revisar_usuario($correo);
            if (count($array)>0) 
            {
                echo "correo ya existe";
            }
            else
            {
                //insert primero a la persona
                $array=$this->Usuarios_m->insert_personas_one($alias,$fecha_nacimiento,$genero);
                if ($array) 
                {
                    $ids = $array[0]->ids;
                    //insert despues a persona
                    $this->Usuarios_m->insert_usuarios_one($correo,$contraseña,$ids,$usuario);
                    echo $ids;      
                }
            }
        }

        public function update_usuarios()
        {
            $this->load->model('Usuarios_m');
            $correo=$this->input->get('correo');
            $contraseña=$this->input->get('contraseña');

            $array=$this->Usuarios_m->revisar_usuario($correo);
            if (count($array)>0) 
            {
                $ids = $array[0]->id;
                echo $ids;
                
                $this->Usuarios_m->update_usuarios($contraseña,$ids);
            }
            else
            {
                echo "error ".count($array);
            }
        }
    }
?>