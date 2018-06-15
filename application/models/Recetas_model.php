<?php

class Recetas_model extends CI_Model {    


        public function getRecetasPropias()
        {       
                $user_session = $this->session->userdata('Usu_Id');
                //Construyo la consulta
                $this->db->select('*');
                $this->db->from('Receta');
                $this->db->where('Usu_Id', $user_session);
                $query = $this->db->get();
                $results = $query ->result();

                for ($i=0; $i < count($results); $i++) { 
                        $ingredientes = $this->getRecetaIngredientesPorId($results[$i]->Rec_Id);
                        $results[$i]->ingredientes = $ingredientes;
                }
                if ($results != NULL) {
                        foreach ($results as $fila):
                        $base[]=$fila;
                        endforeach;                        
                        return $base;
                }else {
                        return false;
                }
                die();

        }     

        public function getRecetas()
        {       
                $user_session = $this->session->userdata('Usu_Id');
                //Construyo la consulta
                $this->db->select('*');
                $this->db->from('Receta');
                $this->db->where('Usu_Id !=', $user_session);
                $query = $this->db->get();
                $results = $query ->result();

                for ($i=0; $i < count($results); $i++) { 
                        $ingredientes = $this->getRecetaIngredientesPorId($results[$i]->Rec_Id);
                        $results[$i]->ingredientes = $ingredientes;
                }
                if ($results != NULL) {
                        foreach ($results as $fila):
                        $base[]=$fila;
                        endforeach;                        
                        return $base;
                }else {
                        return false;
                }
                die();

        }     
        
        public function getRecetaIngredientesPorId($id)
        {
                $this->db->select('R.*, I.Ing_Nombre');
                $this->db->from('Receta_Ingredientes R');
                $this->db->join('Ingredientes I', 'R.Ing_Id = I.Ing_Id');
                $this->db->where('Rec_Id', $id);
                $this->db->order_by('R.RIng_Id', 'asc');
                $query = $this->db->get();
                return $query->result();
        }

        public function deleteRecetasPorId($id)
        {
                $this->db->set('Ing_Estado', 1);
                $this->db->update('Recetas', $this, array('Ing_Id' => $id));
                return true;
        }

        public function borrarIngrediente($id)
        {
                $this->db->delete('Receta_Ingredientes', array('RIng_Id' => $id));
                return true;
        }

        public function updateReceta($datos)
        {       
                $this->db->set('Rec_Fecha_Actualizacion', 'NOW()', FALSE);
                $this->db->set('Usu_Id', $this->session->userdata('Usu_Id'));            
                $this->db->update('Receta', $datos, array('Rec_Id' => $datos['Rec_Id']));
                return true;
        }

        public function createReceta($datos)
        {       
                $this->db->set('Rec_Fecha_Actualizacion', 'NOW()', FALSE);
                $this->db->set('Usu_Id', $this->session->userdata('Usu_Id'));            
                $this->db->insert('Receta', $datos, array('Rec_Id' => $datos['Rec_Id']));
                $lastInsertId = $this->db->insert_id();
                return $lastInsertId;
        }

        public function createIngrediente($data)
        {       
                $this->db->set('Ing_Fecha_Creacion', 'NOW()', FALSE);
                $this->db->set('Ing_Estado', 0);
                $this->db->set('Usu_Id', $this->session->userdata('Usu_Id'));
                $this->db->insert('Recetas', $data);
                $lastInsertId = $this->db->insert_id();
                $resultado = $this->getLastInsert($lastInsertId);
                return $resultado;
        }

        public function getLastInsert($id)
        {
                $this->db->select('I.Ing_Id, I.Ing_Nombre, I.Ing_Imagen, I.Ing_Fecha_Creacion, I.Ing_Comentario, C.Cat_Id, C.Cat_Nombre');
                $this->db->from('Recetas I');
                $this->db->join('Categorias C', 'I.Cat_Id = C.Cat_Id');
                $this->db->where('Ing_Id', $id);
                $query = $this->db->get();
                $resultado = $query->result()[0];
                return $resultado;
        }
}