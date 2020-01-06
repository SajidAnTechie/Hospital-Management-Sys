<?php

    $name=$_POST["name"];
    $email=$_POST["email"];
    $number=$_POST["number"];
    $massage=$_POST["massage"];
    $address=$_POST["address"];

    $to_email="sajidansari33272@gmail.com";
    $subject="New massage from contact form";
    $From_client="Name:".$name."\n". "Number:".$number. "\n"."Address:".$address. "\n". "wrote the following:"."\n\n".$massage;
    $headers = 'from: '.$email."\r\n".
					'Reply-To: '.$email."\r\n".
					'X-Mailer: PHP/' .phpversion();


    if(mail($to_email, $subject, $From_client,$headers)){
        print "<p class='success'>Mail Sent.</p>";
    }else{
        print "<p class='Error'>Sorry there is problem in sending mail</p>";
    }
?>