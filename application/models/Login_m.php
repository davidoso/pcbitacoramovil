<?php
    class Login_m extends CI_Model
    {
        public function iniciar_sesion($usuario, $contra)
        {
            $var = $this->db->query("
                SELECT *
                FROM usuario
                WHERE id='$usuario' and pass='$contra'
            ");
            return $var->result();
        }
    }
?>