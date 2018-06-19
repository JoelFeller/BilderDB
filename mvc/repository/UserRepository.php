<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'benutzer';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $username Wert für die Spalte benutzername
     * @param $e Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($username, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->tableName (username, password) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $passwordHash);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }


    public function login($username, $password){

        $query = "SELECT * FROM {$this->tableName} WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement-> bind_param('s' , $username);

        if(!$statement->execute())
        {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        $user = $result->fetch_object();

        if (password_verify($password, $user->password)) {
             $_SESSION['id']=$user->id; 
             return true;
        }

            return false;



    }

    public function checkName($username) {
        $query = "SELECT * FROM {$this->tableName} WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement-> bind_param('s' , $username);

        if(!$statement->execute())
        {
            throw new Exception($statement->error);
        }

        $result = $statement->get_result();

        return $result->num_rows;

    }
}
