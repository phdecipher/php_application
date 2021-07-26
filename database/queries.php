<?php

    

    class Queries {

        public function create($id, $last_name, $first_name, $course): string {
            require 'database/db.php';

            $message = "";

            $sql = 'INSERT INTO students(ID, LAST_NAME, FIRST_NAME, COURSE) VALUES(:id, :last_name, :first_name, :course)';
            $statement = $connection->prepare($sql);
            
            if ($statement->execute([':id' => $id, ':last_name' => $last_name, ':first_name' => $first_name, ':course' => $course])) {
                $message = 'Data Inserted Successfully.';
            }

            return $message;
        }
    
        public function read(): array {
            
            require 'database/db.php';

            $sql = 'SELECT * FROM students';
    
            $statement = $connection->prepare($sql);
    
            $statement->execute();
    
            $students = $statement->fetchAll(PDO::FETCH_OBJ);

            return $students;
        }

        public function readSingle($id): object {
            require '../database/db.php';

            $sql = 'SELECT * FROM students WHERE ID=:id';

            $statement = $connection->prepare($sql);
            $statement->execute([':id' => $id]);

            $student = $statement->fetch(PDO::FETCH_OBJ);

            return $student;

        }

        public function update($id, $last_name, $first_name, $course) {

            require '../database/db.php';

            $sql = 'UPDATE students SET LAST_NAME=:last_name, FIRST_NAME=:first_name, COURSE=:course WHERE ID=:id';
            $statement = $connection->prepare($sql);

            if ($statement->execute([':id' => $id, ':last_name' => $last_name, ':first_name' => $first_name, ':course' => $course])) {
                header("Location: /application");
            }
        }

        public function delete($id) {
            require 'db.php';

            $sql = 'DELETE FROM students WHERE ID=:id';

            $statement = $connection->prepare($sql);

            if ($statement->execute([':id'=>$id])) {
                header("Location: /application");
}
        }
    }
    

?>