<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('enviarEmail')) {
    include_once("public/lib/PHPMailer/class.phpmailer.php");
    include_once("public/lib/PHPMailer/class.smtp.php");

    function enviarEmail($to, $subject, $msj, $headers = [], $bcc = [])
    {

        $bcc=[];
        $headers="";

        //if(false){
        if (!empty($bcc)) {
            $bcc = explode(",", $bcc);
        } else {
            $bcc = array();
        }

        $email = new PHPMailer();
        $email->IsSMTP();
        $email->SMTPAuth = true;
        $email->SMTPSecure = "tls";
        $email->Host = "smtp.gmail.com";
        $email->Port = 587;
        $email->Username = 'email@dominio.co';
        $email->Password = "password";
        $email->FromName = "PQRSF";
        $email->Subject = $subject;
        foreach ($bcc as $row) {
            $email->AddBCC($row);
        }
        $email->MsgHTML($msj);
        $email->AddAddress($to, "Destinatario");
        $email->IsHTML(true);
      //  $email->Send();
         if(!$email->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $email->ErrorInfo;
          } 
    }



}


