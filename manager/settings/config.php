<?php

@session_start();

global $host, $user, $pass, $db;

$valid_type = array(
    "jpg",
    "jpeg",
    "png",
    "pdf",
    "ico",
    "gif",
    "mp4",
    "webm"
);

class Config
{

    public function Check()
    {

        // Database connection
        $host = '127.0.0.1:3306';
        $user = 'root';
        $pass = '';
        $db   = 'arts';

        $con = mysqli_connect($host, $user, $pass, $db);

        if (!$con) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        mysqli_set_charset($con, "utf8");

        return $con;
    }


    public function validType()
    {

        return array(
            "jpg",
            "jpeg",
            "png",
            "pdf",
            "ico",
            "gif",
            "mp4",
            "webm",
            "docx",
            "doc"
        );
    }


    public function dirLink()
    {

        if (strrpos(__DIR__, "/") > 0) {

            $url = str_replace(
                'manager/settings',
                '',
                __DIR__
            );

        } else {

            $url = str_replace(
                'manager\settings',
                '',
                __DIR__
            );
        }

        return $url;
    }


    public function paytmSetting()
    {

        /*
        return json_encode([
            'environment' => "TEST",
            "merchent_id" => "jwTEYC22041475822055",
            "PAYTM_MERCHANT_KEY" => "gGoThSw4MOAdYH5V",
            "WEBSITE" => "WEBSTAGING"
        ]);
        */

        return json_encode([
            'environment' => "PROD",
            "merchent_id" => "yjLeII59125888815000",
            "PAYTM_MERCHANT_KEY" => "XTYTI1aTuFT437OQ",
            "WEBSITE" => "DEFAULT"
        ]);
    }
}


/*=======++++++++++ Basic Settings ++++++++++++==========*/

// Website URL
$siteURL1 = 'http://localhost/arts/';

define("SITE_URL", $siteURL1);

define("SITE_NAME", 'feane-1.0.0');

define("SITE_EMAIL", 'piyush@fujiiryoki.co.in');

// Manager URL
define("BASE_URL", SITE_URL . 'manager/');


// Config object
$setting = new Config();


// Project directory
if (strrpos(__DIR__, "/") > 0) {

    $url = str_replace(
        'manager/settings',
        '',
        __DIR__
    );

} else {

    $url = str_replace(
        'manager\settings',
        '',
        __DIR__
    );
}


// Set database charset
mysqli_set_charset(
    $setting->Check(),
    "utf8"
);

?>