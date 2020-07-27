<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller{

  function __construct(){    
    error_reporting(0);
  }  

  public function sendNotif($tokenarray){
    define('API_ACCESS_KEY','AAAAE15r4Ds:APA91bHT2VxUeDVk2usnZunV2e-bD7EKWPHHLVLy7bWstABa3ahGFn6U4kH4kGLXFLOi2JsYLKsAyyQn0tK3Ly3kNQcKt51_PL4gQ4MU2fAXZ0RzLpyukzsXtdYMItHu9BedlTFFjObM');
    $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    $notification = [
        'title' => 'New Article Released',
        'body' => 'A new article is released!!! Check on latest article section and click on "Article Name".',
        'icon' =>'myIcon'
    ];
    $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

    $fcmNotification = [
        'registration_ids' => $tokenarray,
        'notification' => $notification,
        'data' => $extraNotificationData
    ];

    $headers = [
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
    ];


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$fcmUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    $result = curl_exec($ch);
    curl_close($ch);
  }

}