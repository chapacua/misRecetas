<?php

class Usuarios_model extends CI_Model {

        public function valLogin($usuario, $password)
        {       
                //Construyo la consulta
                $this->db->select('Usu_Id, Usu_Usuario, Usu_Password');
                $this->db->where('Usu_Usuario', $usuario);
                $this->db->where('Usu_Password', $password);
                $query = $this->db->get('Usuarios');

                //Valido el resultado
                if ($query->result()[0]->Usu_Usuario === NULL):
                        return false;
                else:  
                        //Llamo función que establece la sesión 
                        $this->setSession($query->result()[0]->Usu_Id);
                        return true;
                endif;
        }       

        public function saveUsuario($datos)
        {       
                $this->db->set('Usu_Rol', '1');
                $this->db->set('Usu_Fecha_Creacion', 'NOW()', FALSE);
                $this->db->insert('Usuarios', $datos);
        }


        public function setSession($Usu_Id)
        {
                //Construyo la consulta
                $this->db->select('Usu_Nombre, Usu_Rol');
                $this->db->where('Usu_Id', $Usu_Id);
                $query = $this->db->get('Usuarios');  
                //Se establece la sesion
                $sessionVars = array(
                        'Usu_Id'  => $Usu_Id,
                        'Usu_Nombre'     => $query->result()[0]->Usu_Nombre,
                        'Usu_Rol'     => $query->result()[0]->Usu_Rol,
                        'logged_in' => TRUE
                );

                $this->session->set_userdata($sessionVars);
                return true;            
        }

        public function getUsuarios()
        {       
                //Construyo la consulta
                $this->db->select('Usu_Id, Usu_Nombre, Usu_Correo, Usu_Rol');
                $query = $this->db->get('Usuarios');
                foreach ($query ->result() as $fila):
                        $base[]=$fila;
                endforeach;
                return $base;

        }     
        
        public function deleteUsuarioPorId($id)
        {
                $this->db->delete('Usuarios', array('Usu_Id' => $id));
                return true;
        }

        public function updateUsuarioRol($id)
        {       
                $this->db->set('Usu_Rol', '1');
                $this->db->update('Usuarios', $this, array('Usu_Id' => $id));
                return true;
        }

        public function updateUsuarioPassword($id)
        {       
                $this->db->set('Usu_Password', sha1(md5('asdf123..')));
                $this->db->update('Usuarios', $this, array('Usu_Id' => $id));
                return true;
        }
}