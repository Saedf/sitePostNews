<?php
/**
 * Created by PhpStorm.
 * User: Saed
 * Date: 5/12/2018
 * Time: 11:45 AM
 */

class DataBaseManager
{
    const DATABASE_NAME = "7learn_db";


    function CreateDataBase()
    {
        $Servername = "localhost";
        $UserName = "root";
        $password = "";
        $Connection = mysqli_connect($Servername, $UserName, $password);
        if ($Connection->connect_error) {
            die("Connection Field" . $Connection->connect_error);
        }
        $sqlCommand = "CREATE DATABASE  " . DataBaseManager::DATABASE_NAME;
        if ($Connection->query($sqlCommand) === true) {
            echo "DataBase Created is Succefully ";

        }
        $Connection->close();

    }

    function CreateTableNews()
    {
        $Servername = "localhost";
        $UserName = "root";
        $password = "";
        $Connection = mysqli_connect($Servername, $UserName, $password, DataBaseManager::DATABASE_NAME);
        if ($Connection->connect_error) {
            die("Connection Field" . $Connection->connect_error);
        }
        $sqlcommand = "Create TABLE tblNews(id INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        imgNews_url TEXT,
                        titleNews TEXT,
                        contentNews TEXT,
                        DateNews DATE)";
        if ($Connection->query($sqlcommand) === true) {
            echo "Table Created is Successfully";
        }
        $Connection->close();
    }

    function getPostNews()
    {
        $Servername = "localhost";
        $UserName = "root";
        $password = "";
        $Connection = mysqli_connect($Servername, $UserName, $password, DataBaseManager::DATABASE_NAME);
        if ($Connection->connect_error) {
            die("Connection Field" . $Connection->connect_error);
        }
        $sqlCommand = "SELECT * FROM tblNews";
        $resualt = $Connection->query($sqlCommand);
        $newsArray = array();
        if ($resualt->num_rows > 0) {
            for ($i = 0; $i < $resualt->num_rows; $i++) {
                $newsArray[$i] = $resualt->fetch_assoc();
            }
        }
        echo json_encode($newsArray);
        $Connection->close();
    }

    function createUsersTable()
    {
        $Servername = "localhost";
        $UserName = "root";
        $password = "";
        $connection = mysqli_connect($Servername, $UserName, $password, DatabaseManager::DATABASE_NAME);
        if ($connection->connect_error) {
            die("Connection Field" . $connection->connect_error);
        }
        $sqlCommand = "CREATE TABLE users (id INTEGER PRIMARY KEY AUTO_INCREMENT,
                              first_name TEXT,
                               last_name TEXT,
                               age INTEGER ,
                               gender TEXT,
                               skills TEXT,
                               has_job BOOLEAN)";
        if ($connection->query($sqlCommand) === true) {
            echo "Table Created is Successfully";
        }
        $connection->close();
    }

    function addUser($firstName, $lastName, $age, $gender, $skills, $hasJob)
    {

        $Servername = "localhost";
        $UserName = "root";
        $password = "";
        $connection = mysqli_connect($Servername, $UserName, $password, DatabaseManager::DATABASE_NAME);
        if ($connection->connect_error) {
            die("Connection Field" . $connection->connect_error);
        }
        $sqlCommand = "INSERT INTO users(first_name,last_name,age,gender,skills,has_job) VALUES('$firstName','$lastName','$age','$gender','$skills','$hasJob')";
        if ($connection->query($sqlCommand)===true) {
            return true;
        } else {
            return false;
        }
        $connection->close();
    }

}