<?php
return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    "username" => "3c195f8cccdb60",
    "password" => "7adc60c576fe68",
    "sendmail" => "/usr/sbin/sendmail -bs"
];