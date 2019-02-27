<?php
    class Usuario_m extends CI_Model
    {
        public function get_last_10_trabajos()
        {
            $var=$this->db->query("
                SELECT
                    id_trabajo as id,
                    DATE_FORMAT(tra_inicio,'%d/%m/%Y') as fecha,
                    tra_familia as familia,
                    tra_equipo as equipo,
                    tra_descripcion as descripcion
                FROM trabajo
                ORDER BY tra_registro DESC
                Limit 10
            ");
            return $var->result();
        }

        public function get_trabajo($id)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_turno as turno,
                    DATE_FORMAT(t.tra_inicio, '%d/%m/%Y') as fecha_inicio,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%d/%m/%Y') as fecha_termino,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_descripcion as descripcion,
                    t.tra_pendiente as pendiente,
                    t.tra_personal as personal,
                    t.tra_usuario as usuario,
                    t.tra_registro as registro,
                    t.tra_estatus as estatus,
                    DATE_FORMAT(t.tra_inicio, '%Y-%m-%d') as u_fecha_inicio,
                    DATE_FORMAT(t.tra_termino, '%Y-%m-%d') as u_fecha_termino
                FROM trabajo t
                WHERE t.id_trabajo='$id' LIMIT 50
            ");
            return $var->result();
        }

        /* -------------------------------------------------------------- Filtros -------------------------------------------------------------- */

        public function get_111($fi, $ft, $fa)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE DATE(t.tra_inicio) BETWEEN '$fi' AND '$ft' AND t.tra_equipo like '$fa' AND t.tra_estatus=1
                ORDER BY t.tra_inicio ASC
            ");
            return $var->result();
        }

        public function get_110($fi, $ft)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE DATE(t.tra_inicio) BETWEEN '$fi' AND '$ft' AND t.tra_estatus=1
                ORDER BY t.tra_inicio ASC, t.tra_familia ASC, t.tra_equipo ASC
            ");
            return $var->result();
        }

        public function get_101($fi, $fa)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE DATE(t.tra_inicio)='$fi' AND t.tra_equipo like '$fa' AND t.tra_estatus=1
                ORDER BY t.tra_registro DESC
            ");
            return $var->result();
        }

        public function get_100($fi)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE DATE(t.tra_inicio)='$fi' AND t.tra_estatus=1
                ORDER BY t.tra_familia ASC, t.tra_equipo ASC
            ");
            return $var->result();
        }

        public function get_011($ft, $fa)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE DATE(t.tra_termino)='$ft' AND t.tra_equipo like '$fa' AND t.tra_estatus=1
                ORDER BY t.tra_registro DESC
            ");
            return $var->result();
        }

        public function get_010($ft)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE DATE(t.tra_termino)='$ft' AND t.tra_estatus=1
                ORDER BY t.tra_familia ASC, t.tra_equipo ASC
            ");
            return $var->result();
        }

        public function get_001($fa)
        {
            $var=$this->db->query("
                SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                WHERE t.tra_equipo='$fa' AND t.tra_estatus=1
                ORDER BY t.tra_inicio DESC, t.tra_registro DESC
            ");
            return $var->result();
        }

        public function get_trabajos_filtro($filtro)
        {
            $q="SELECT
                    t.id_trabajo as id,
                    DATE_FORMAT(t.tra_inicio,'%d/%m/%Y') as fecha,
                    DATE_FORMAT(t.tra_termino,'%d/%m/%Y') as fecha_t,
                    DATE_FORMAT(t.tra_inicio, '%H:%i') as hora_inicio,
                    DATE_FORMAT(t.tra_termino, '%H:%i') as hora_termino,
                    t.tra_familia as familia,
                    t.tra_equipo as equipo,
                    t.tra_descripcion as descripcion,
                    t.tra_usuario as usuario,
                    t.tra_personal as personal,
                    t.tra_estatus as estatus
                FROM trabajo t
                ".$filtro."
                ORDER BY t.tra_inicio DESC";

            $var=$this->db->query($q);
            return $var->result();
        }

        /* -------------------------------------------------------------- /Filtros -------------------------------------------------------------- */

        public function insert_trabajo($familia, $equipo, $inicio, $turno, $descripcion, $termino, $pendientes, $usuario, $personal)
        {
            $this->db->query("
                call spInsertTrabajo('$familia','$equipo','$inicio','$turno','$descripcion','$termino','$pendientes','$usuario','$personal')
            ");
        }

        public function update_trabajo($id, $familia, $equipo, $inicio, $turno, $descripcion, $termino, $pendientes, $usuario, $personal)
        {
            $this->db->query("
                call spUpdateTrabajo('$id','$familia','$equipo','$inicio','$turno','$descripcion','$termino','$pendientes','$usuario','$personal')
            ");
        }

        public function delete_trabajo($trabajo, $opcion)
        {
            $this->db->query("
                call spUDeleteTrabajo('$trabajo','$opcion')
            ");
        }

        /* -------------------------------------------------------------- API WEB -------------------------------------------------------------- */

        public function get_familias()
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://vadaexterno:8080/wsAutEmp/Service1.asmx/FamiliasEquipos");
            curl_setopt($ch, CURLOPT_POST, 1); //se puede comentar y de todos modos jala
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,"");
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch); // la variable output contiene el json raw

            $data=json_decode($output);

            return $data;
        }

        public function get_equipos($familia)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://vadaexterno:8080/wsAutEmp/Service1.asmx/EquiposFamilia");
            curl_setopt($ch, CURLOPT_POST, 1); //se puede comentar y de todos modos jala
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,"familia=$familia");
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch); // la variable output contiene el json raw

            $data=json_decode($output);

            return $data;
        }

        /* -------------------------------------------------------------- /API WEB -------------------------------------------------------------- */
    }
?>