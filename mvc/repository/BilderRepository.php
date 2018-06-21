
<?php

require_once '../lib/Repository.php';


class BilderRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'bilder';


    public function imgToFolder($image)
    {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $timestamp = time();
        $file_destination = "/images" . $timestamp . '.' . $ext;

        if (move_uploaded_file($image['tmp_name'], $file_destination)){
            echo $file_destination;
        }
        return $file_destination;
    }

    public function create($gid, $image, $title, $description)
    {

        $query = "INSERT INTO $this->tableName (gid, image, title, description) VALUES (?, ?, ?, ?)";
        $image = '/' . $image;


        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('isss', $gid, $image, $title, $description);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}
?>