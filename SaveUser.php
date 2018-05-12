<?php
/**
 * Created by PhpStorm.
 * User: Saed
 * Date: 5/12/2018
 * Time: 12:16 PM
 */
$json=file_get_contents('php://input');
$userInfo=json_decode($json);
$firstName=$userInfo->first_name;
$lastName=$userInfo->last_name;
$age=$userInfo->age;
$gender=$userInfo->gender;
$skills=$userInfo->skills;
$hasJob=$userInfo->has_job;

$skillsStr=implode(",",$skills);
include 'DatabaseManager.php';
$databaseManager=new DatabaseManager();

$success=$databaseManager->addUser($firstName,$lastName,$age,$gender,$skillsStr,$hasJob);
echo json_encode(["success"=>$success]);