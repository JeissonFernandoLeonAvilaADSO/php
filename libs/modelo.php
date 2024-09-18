<?php

    class modelo{
        protected $id;
        protected $table;
        protected $db;

        public function __construct(
            $id,
            $table,
            PDO $connection
        )
        {
            $this->id = $id;
            $this->table = $table;
            $this->db = $connection;
        }


        public function getAll(){
            $stm = $this->db->prepare("SELECT * from {$this->table}");
            $stm->execute();
            return $stm->fetchAll();
        }

        public function getById($id){
            $stm = $this->db->prepare("SELECT * from {$this->table} WHERE id = :id");
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetch();
        }
        
        public function store($data){

            $sql ="INSERT INTO users (";
            
            foreach($data as $clave => $valor){
                if($valor == "") continue;

                $sql .= "{$clave},";

            };
            $sql = trim($sql, ', ');
            $sql .= ") VALUES (";

            foreach($data as $clave => $valor){
                if($valor == "") continue;

                $sql .= ":{$clave},";

            };
            $sql = trim($sql, ', ');
            $sql .= ")";

            $stm = $this->db->prepare($sql);
            foreach($data as $clave => $valor){
                if($valor == "") continue;
                    
                $stm->bindValue(":{$clave}", $valor);

            };

            $stm->execute();
            return $id = $this->db->lastInsertId();
        }

        public function update($id, $data){
            $sql ="UPDATE users SET ";
            
            foreach($data as $clave => $valor){
                $sql .= "{$clave} = :{$clave},";
            };

            $sql = trim($sql, ', ');
            $sql .= " WHERE id = :id";

            $stm = $this->db->prepare($sql);

            foreach($data as $clave => $valor){
                $stm->bindValue(":{$clave}", $valor);
            };
            $stm->bindValue(":id", $id);
            $stm->execute();
        }




        public function delete($id){
            $sql = "DELETE FROM users WHERE id = :id";

            $stm = $this->db->prepare($sql);
            $stm->bindValue(":id", $id);
            $stm->execute();
        }

    }

?>