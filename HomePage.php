<?php
/**
 * Created by PhpStorm.
 * User: Saed
 * Date: 5/12/2018
 * Time: 12:17 PM
 */
include "DataBaseManager.php";
$databaseManage=new DataBaseManager();
$databaseManage->CreateDataBase();
$databaseManage->CreateTableNews();
$databaseManage->createUsersTable();
