<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_controller {

    public function index()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $fam_equipos=$this->obtener_equipos(); // obtiene un array donde están todos las familias y sus respectivos equipos
            $this->session->set_userdata('fam_equipos',$fam_equipos); // prepara una variable de sesión con el array
            redirect('Principal/registrar_trabajo');
        }
        redirect('Login'); // si la sesión caduca, lo reenvia a login
    }

    public function registrar_trabajo()
    {
        $this->load->model('Usuario_m');

        $familia=$this->input->get('f');
        if ($familia!=null)
        {
            $array=array(
                'familias'=>$this->Usuario_m->get_familias(),
                'equipos'=>$this->Usuario_m->get_equipos($familia)
            );
        }
        else
        {
            $array=array(
                'familias'=>$this->Usuario_m->get_familias()
            );
        }

        if ($this->session->userdata('usuario')!=NULL)
        {
            $this->load->view('recursos/header');
            $this->load->view('recursos/usuario/navbar');
            $this->load->view('usuario/reg_trabajo',$array);
            $this->load->view('recursos/footer');
        }
        else
        {
            redirect('Login'); // si la sesión caduca, lo reenvia a login
        }
    }

    public function trabajo_registrado() // cuando registra un trabajo va a esta pantalla
    {
        $this->load->model('Usuario_m');
        $array=array(
            'trabajos'=>$this->Usuario_m->get_last_10_trabajos()
        );

        $this->load->view('recursos/header');
        $this->load->view('recursos/usuario/navbar');
        $this->load->view('usuario/trabajo_registrado',$array);
        $this->load->view('recursos/footer');
    }

    public function obtener_equipos() // junta en un array (matriz) todos los equipos, divididos por familia
    {
        $this->load->model('Usuario_m');
        $familias=$this->Usuario_m->get_familias();

        foreach($familias as $f)
        {
            $i=0;
            $aux=array('');
            $equipos=$this->Usuario_m->get_equipos($f->FAMILIA);
            foreach($equipos as $e)
            {
                $aux[$i]=$e->EQUIPO;
                $i++;
            }
            $fam_equipo[$f->FAMILIA]=$aux;
        }

        //var_dump($fam_equipo);
        return($fam_equipo);
    }

    public function trabajos_registrados()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $fi=$this->input->get('fi');
            $ft=$this->input->get('ft');
            $fa=$this->input->get('fa');
            $eq=$this->input->get('eq');
            $us=$this->input->get('us');
            $des=$this->input->get('des');

            $filtro=$this->filtro_busqueda($fi, $ft, $fa, $eq, $us, $des);

            $this->load->model('Usuario_m');
            $array=array(
                'familias'=>$this->Usuario_m->get_familias(),
                'trabajos'=>$this->Usuario_m->get_trabajos_filtro($filtro)
            );

            $this->load->view('recursos/header');
            $this->load->view('recursos/usuario/navbar');
            $this->load->view('usuario/trabajos',$array);
            $this->load->view('recursos/footer');
        }
        else
        {
            redirect('Login'); // si la sesión caduca, lo reenvia a login
        }

    }

    public function ver_trabajo()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $trabajo=$this->input->get('t');

            $this->load->model('Usuario_m');
            $array=array(
                'trabajo'=>$this->Usuario_m->get_trabajo($trabajo)
            );

            $this->load->view('recursos/header');
            $this->load->view('recursos/usuario/navbar');
            $this->load->view('usuario/ver_trabajo',$array);
            $this->load->view('recursos/footer');
        }
        else
        {
            redirect('Login'); // si la sesión caduca, lo reenvia a login
        }

    }

    public function insert_trabajo()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            /*$array=array(
                'familia'=>$this->input->post('familia')
            );*/ // Para definir un array

            $familia=$this->input->post('familia');
            $equipo=$this->input->post('equipo');
            $tipo=$this->input->post('tipo');
            $fecha_inicio=$this->input->post('fecha_inicio');
            $hora_inicio=$this->input->post('hora_inicio');
            $turno=$this->input->post('turno');
            $descripcion=$this->input->post('descripcion');
            $fecha_termino=$this->input->post('fecha_termino');
            $hora_termino=$this->input->post('hora_termino');
            $pendientes=$this->input->post('pendientes');
            $personal=$this->input->post('personal');

            $inicio=$this->create_datetime($fecha_inicio, $hora_inicio);
            $termino=$this->create_datetime($fecha_termino, $hora_termino);

            $this->load->model('Usuario_m');
            $this->Usuario_m->insert_trabajo($familia,$equipo,$inicio,$turno,$descripcion,$termino,$pendientes,$this->session->userdata('usuario'),$personal);

            redirect('Principal/trabajo_registrado');
        }
        else
        {
            redirect('Login'); // si la sesión caduca, lo reenvia a login
        }
    }

    public function editar_trabajo()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $trabajo=$this->input->get('t');
            $familia=$this->input->get('f');

            $this->load->model('Usuario_m');

            if ($familia!=null)
            {
                    $array=array(
                    'familias'=>$this->Usuario_m->get_familias(),
                    'equipos'=>$this->Usuario_m->get_equipos($familia),
                    'trabajo'=>$this->Usuario_m->get_trabajo($trabajo)
                );
            }
            else
            {
                $array=array(
                    'familias'=>$this->Usuario_m->get_familias(),
                    'trabajo'=>$this->Usuario_m->get_trabajo($trabajo)
                );
            }

            $this->load->view('recursos/header');
            $this->load->view('recursos/usuario/navbar');
            $this->load->view('usuario/editar_trabajo',$array);
            $this->load->view('recursos/footer');
        }
        else
        {
            redirect('Login'); // si la sesión caduca, lo reenvia a login
        }
    }

    public function create_datetime($f, $h)
    {
        if ($f=='' && $h=='')
        {
            $dt='';
        }
        else
        {
            $hora=$h.':00';
            $dt=$f.' '.$hora;
        }

        return $dt;
    }

    public function update_trabajo()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $trabajo=$this->input->get('t');
            $familia=$this->input->post('familia');
            $equipo=$this->input->post('equipo');
            $fecha_inicio=$this->input->post('fecha_inicio');
            $hora_inicio=$this->input->post('hora_inicio');
            $turno=$this->input->post('turno');
            $descripcion=$this->input->post('descripcion');
            $fecha_termino=$this->input->post('fecha_termino');
            $hora_termino=$this->input->post('hora_termino');
            $pendientes=$this->input->post('pendientes');
            $personal=$this->input->post('personal');

            $inicio=$this->create_datetime($fecha_inicio, $hora_inicio);
            $termino=$this->create_datetime($fecha_termino, $hora_termino);

            $this->load->model('Usuario_m');
            $this->Usuario_m->update_trabajo($trabajo,$familia,$equipo,$inicio,$turno,$descripcion,$termino,$pendientes,$this->session->userdata('usuario'),$personal);

            redirect('Principal/ver_trabajo?t='.$trabajo);
        }
        else
        {
            redirect('Login'); // si la sesión caduca, lo reenvia a login
        }
    }

    public function delete_trabajo()
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $trabajo=$this->input->get('t');
            $opcion=$this->input->get('o');
            $this->load->model('Usuario_m');
            $this->Usuario_m->delete_trabajo($trabajo,$opcion);

            redirect('Principal/ver_trabajo?t='.$trabajo);
        }
    }

    public function filtro_busqueda($fi, $ft, $fa, $eq, $us, $des)
    {
        $w='WHERE t.tra_estatus=1';

        if ($fi != NULL && $ft != NULL)
        {
            $w=$w." AND DATE(t.tra_inicio) BETWEEN '".$fi."' AND '".$ft."'";
        }
        elseif ($fi != NULL)
        {
            $w=$w." AND DATE(t.tra_inicio)='".$fi."'";
        }
        elseif ($ft != NULL)
        {
            $w=$w." AND DATE(t.tra_termino)='".$ft."'";
        }

        if ($fa != NULL)
        {
            $w=$w." AND t.tra_familia='".$fa."'";
        }

        if ($eq != NULL)
        {
            $w=$w." AND t.tra_equipo='".$eq."'";
        }

        if ($us != NULL)
        {
            $w=$w." AND t.tra_usuario='".$us."'";
        }

        if ($des != NULL)
        {
            $w=$w." AND t.tra_descripcion LIKE '%".$des."%'";
        }

        return $w;
    }

    public function ajax_equipos() // llena el campo de equipos dependiendo de la familia elegida
    {
        if ($this->session->userdata('usuario')!=NULL)
        {
            $familia=$this->input->get('f');

            $this->load->model('Usuario_m');
            $equipos=$this->Usuario_m->get_equipos($familia);

            echo '<option value="" selected disabled></option>';
            foreach($equipos as $e)
            {
                echo '<option value="'.$e->EQUIPO.'">'.$e->EQUIPO.'</option>';
            }
        }
    }
}
?>