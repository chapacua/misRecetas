<?php

class Ingredientes_model extends CI_Model {    


        public function getIngredientes()
        {       
                //Construyo la consulta
                $this->db->select('I.Ing_Id, I.Ing_Nombre, I.Ing_Imagen, I.Ing_Fecha_Creacion, I.Ing_Comentario, C.Cat_Id, C.Cat_Nombre');
                $this->db->from('Ingredientes I');
                $this->db->join('Categorias C', 'I.Cat_Id = C.Cat_Id');
                $this->db->where('Ing_Estado', 0);
                $query = $this->db->get();
                if ($query ->result() != NULL) {
                        foreach ($query ->result() as $fila):
                        $base[]=$fila;
                        endforeach;                        
                        return $base;
                }else {
                        return false;
                }
                die();

        }     
        
        public function getIngredientesParaMostrar()
        {
                                //Construyo la consulta
                $this->db->select('I.Ing_Id, I.Ing_Nombre');
                $this->db->from('Ingredientes I');
                $query = $this->db->get();
                if ($query ->result() != NULL) {
                        foreach ($query ->result() as $fila):
                        $base[]=$fila;
                        endforeach;                        
                        return $base;
                }else {
                        return false;
                }
        }
        public function deleteIngredientesPorId($id)
        {
                $this->db->set('Ing_Estado', 1);
                $this->db->update('Ingredientes', $this, array('Ing_Id' => $id));
                return true;
        }

        public function updateIngrediente($datos)
        {       
                $this->db->set('Ing_Fecha_Creacion', 'NOW()', FALSE);
                $this->db->set('Ing_Estado', 0);
                $this->db->set('Usu_Id', $this->session->userdata('Usu_Id'));            
                $this->db->update('Ingredientes', $datos, array('Ing_Id' => $datos['Ing_Id']));
                return true;
        }
        
        public function createRecetaIngredientes($datos, $Rec_Id)
        {       
                var_dump(count($datos));
                $this->deleteRecetaIngredientesPorId($Rec_Id);
                for ($i=0; $i < count($datos)/2 ; $i++) { 
                        $Ing_Id = $datos['Ing-'.$i];
                        $RIng_Cantidad = $datos['Cantidad'.$i];
                        $sql = "INSERT INTO `Receta_Ingredientes` (RIng_Fecha_Creacion, `Ing_Id`, `RIng_Cantidad`, `Rec_Id`) VALUES (NOW(), $Ing_Id, $RIng_Cantidad, $Rec_Id)";                         
                        $this->db->query($sql); 
                }
        }
        
        public function deleteRecetaIngredientesPorId($Rec_Id)
        {                
                $this->db->delete('Receta_Ingredientes', array('Rec_Id' => $Rec_Id));
                return true;
        }


        public function createIngrediente($data)
        {       
                $this->db->set('Ing_Fecha_Creacion', 'NOW()', FALSE);
                $this->db->set('Ing_Estado', 0);
                $this->db->set('Usu_Id', $this->session->userdata('Usu_Id'));
                $this->db->insert('Ingredientes', $data);
                $lastInsertId = $this->db->insert_id();
                $resultado = $this->getLastInsert($lastInsertId);
                return $resultado;
        }

        public function getLastInsert($id)
        {
                $this->db->select('I.Ing_Id, I.Ing_Nombre, I.Ing_Imagen, I.Ing_Fecha_Creacion, I.Ing_Comentario, C.Cat_Id, C.Cat_Nombre');
                $this->db->from('Ingredientes I');
                $this->db->join('Categorias C', 'I.Cat_Id = C.Cat_Id');
                $this->db->where('Ing_Id', $id);
                $query = $this->db->get();
                $resultado = $query->result()[0];
                return $resultado;
        }
}