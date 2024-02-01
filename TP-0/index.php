<?php
$emails = array(file_get_contents('Emails.txt'));


echo "hello world";
$n=0;
if (isset($emails)){
    foreach($emails as $email){
        print "Email $n : ".$email."<br>";
        $n+=1;
    }
}

// if (isset($emails)){
//     foreach($emails as $email){
//         echo $email;
//     }
// }
