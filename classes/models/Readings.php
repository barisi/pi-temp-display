<?php
/**
 * Created by PhpStorm.
 * User: Barisi
 * Date: 09/10/2015
 * Time: 17:27
 */

require_once($_SERVER['DOCUMENT_ROOT']."/pi-temp-display/connection/Connection.php");


class Readings extends Connection
{
    public function __construct()
    {

    }

    public function getReading($id)
    {
        //Retrieve reading from the database using the readingID in the parameter and assign to the $reading variable
        $statement = parent::getDBConnection()->prepare("SELECT * FROM temperature_readings WHERE id = ?");
        $statement->execute(array($id));
        $reading = $statement->fetchObject();
        //Return the $reading variable
        return $reading;
    }

    public function getReadings($limit)
    {
        //Retrieve reading from the database using the readingID in the parameter and assign to the $reading variable
        $statement = parent::getDBConnection()->prepare("(SELECT * FROM temperature_readings ORDER BY id DESC LIMIT 24) ORDER BY id ASC");
        $statement->execute(array());
        $readings = $statement->fetchAll();
        //Return the query results
        return $readings;
    }
}
?>
