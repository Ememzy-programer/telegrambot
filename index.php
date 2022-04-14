<?php
$BOT_TOKEN = "YOUR BOT TOKEN";
$update = file_get_contents('php://input');
if(empty($update)){
    exit();
}
$array = json_decode($update);


$user_id = $array->message->from->id;


$message = $array->message->text;


$fname = $array->message->from->first_name;
$lname = $array->message->from->last_name;



if($message == "How are you"){
   $replyMarkup = array(
            'keyboard' => array(
                array("How are you", "Am sick"),
                array("Am busy")
            ),
            'resize_keyboard' => true
        );
        // checking if this user has already login in before
            $useit = json_encode($replyMarkup);
            $parameters = array(
                "chat_id" => $user_id,
                "parseMode" => "html",
                "text" => "Am fine",
                "reply_markup" => $useit
            ); 
}elseif($message == "Am sick"){
      $replyMarkup = array(
            'keyboard' => array(
                array("How are you", "Am sick"),
                array("Am busy")
            ),
            'resize_keyboard' => true
        );
        // checking if this user has already login in before
            $useit = json_encode($replyMarkup);
            $parameters = array(
                "chat_id" => $user_id,
                "parseMode" => "html",
                "text" => "Am sorry about that, visit a hospital",
                "reply_markup" => $useit
            ); 
}elseif($message == "Am busy"){
     $replyMarkup = array(
            'keyboard' => array(
                array("How are you", "Am sick"),
                array("Am busy")
            ),
            'resize_keyboard' => true
        );
        // checking if this user has already login in before
            $useit = json_encode($replyMarkup);
            $parameters = array(
                "chat_id" => $user_id,
                "parseMode" => "html",
                "text" => "Ok $fname, try talking to me when you are free.",
                "reply_markup" => $useit
            ); 
}else{
    $replyMarkup = array(
            'keyboard' => array(
                array("How are you", "Am sick"),
                array("Am busy")
            ),
            'resize_keyboard' => true
        );
        // checking if this user has already login in before
            $useit = json_encode($replyMarkup);
            $parameters = array(
                "chat_id" => $user_id,
                "parseMode" => "html",
                "text" => "Please $fname choose one of the statement",
                "reply_markup" => $useit
            ); 
}


            
            
    send("sendMessage", $parameters);





function send($method, $data){
    global $BOT_TOKEN;
    $url = "https://api.telegram.org/bot$BOT_TOKEN/$method";

    if(!$curld = curl_init()){
        exit;
    }
    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curld);
    curl_close($curld);
    return $output;
}



?>
