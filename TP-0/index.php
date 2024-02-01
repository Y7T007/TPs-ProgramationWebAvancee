<?php
$emails = array(file_get_contents('Emails.txt'));


echo "hello world";
if (isset($emails)){
    foreach($emails as $email){
        print $email."<br>";
    }
}

// if (isset($emails)){
//     foreach($emails as $email){
//         echo $email;
//     }
// }
