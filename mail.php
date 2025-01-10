<?php

        $subject = "Zaron Ticket ID ";
        $body = '54656';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <zaron>' . "\r\n";
        $headers .= 'Bcc: babu@admonk.in' . "\r\n";
        mail($to,$subject,$body,$headers);
