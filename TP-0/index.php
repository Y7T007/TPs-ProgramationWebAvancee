

<?php

$emails = file('./Emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


$n=0;
if (isset($emails)){
    foreach($emails as $email){
        print "Email $n : ".$email."<br>";
        $n+=1;
    }
}
