<?php
/**
 * TODO
 * Given the limited time, I limited myself to this decision. It is not optimal,
 * but it will work within the framework of the task.
 * Ideally, it would be nice to add exceptions, logging, dirs and an autoloader for classes.
 */
require_once 'MySqlRepository.php';
require_once 'VisitorData.php';
require_once 'HttpReceiver.php';

$repository = new MySqlRepository();
$httpReceiver = new HttpReceiver();
$visitorData = new VisitorData();

// Gathering visitor information
$ip_address = $httpReceiver->getIpAddress();
$user_agent = $httpReceiver->getUserAgent();
$view_date = date('Y-m-d H:i:s');
$page_url = $httpReceiver->getPageUrl();

// Finding or creating a visitor record
$row = $repository->find($ip_address, $user_agent, $page_url);
$views_count = $row ? $row['views_count'] + 1 : 1;
$visitorId = $row ? $row['id'] : null;

// Setting up visitor data

$visitorData->setData($visitorId, $ip_address, $user_agent, $view_date, $page_url, $views_count);

// Saving the visitor data
$repository->save($visitorData);

// Displaying the image
header('Content-Type: image/jpeg');
readfile('image.jpg');
exit();
