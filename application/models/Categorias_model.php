<?php

class Categorias_model extends CI_Model {    

        public function saveCategorias($datos)
        {       
                $this->db->set('Usu_Rol', '1');
                $this->db->set('Usu_Fecha_Creacion', 'NOW()', FALSE);
                $this->db->insert('Categorias', $datos);
        }


        public function setSession($Usu_Id)
        {
                //Construyo la consulta
                $this->db->select('Usu_Nombre, Usu_Rol');
                $this->db->where('Usu_Id', $Usu_Id);
                $query = $this->db->get('Categorias');  
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

        public function getCategorias()
        {       
                //Construyo la consulta
                $this->db->select('Cat_Nombre, Cat_Id, Cat_Fecha_Creacion');
                $query = $this->db->get('Categorias');
                foreach ($query ->result() as $fila):
                        $base[]=$fila;
                endforeach;
                return $base;

        }     
        
        public function deleteCategoriasPorId($id)
        {
                $this->db->delete('Categorias', array('Cat_Id' => $id));
                return true;
        }

        public function updateCategoria($datos)
        {       
                $this->db->update('Categorias', $datos, array('Cat_Id' => $datos['Cat_Id']));
                return true;
        }

        public function updateCategoriasPassword($id)
        {       
                $this->db->set('Usu_Password', sha1(md5('asdf123..')));
                $this->db->update('Categorias', $this, array('Usu_Id' => $id));
                return true;
        }

        public function createCategoria($data)
        {       
                $this->db->set('Cat_Fecha_Creacion', 'NOW()', FALSE);
                $this->db->insert('Categorias', $data);
                return true;
        }
}