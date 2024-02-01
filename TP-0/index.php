<?php
$emails = array(file_get_contents('Emails.txt'));


echo "hello world";
if (isset($emails)){
    foreach($emails as $email){
        print $email;
    }
}

// if (isset($emails)){
//     foreach($emails as $email){
//         echo $email;
//     }
// }
