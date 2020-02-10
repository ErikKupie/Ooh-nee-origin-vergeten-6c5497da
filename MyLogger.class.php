<?php

class MyLogger 
{

    public $origin;

    public function __construct(){
        $a = func_get_arg(0);
        if ($a == false){
            echo "Ooh nee, origin vergeten!";
        exit;
        } else {
            $this->origin = $a;
        }
    }

    public function log ($message, $a){
        $a =  strtoupper($a);
        switch($a){
            case "WARNING":
                $this->warning ($message);
            break;
            case "ERROR":
                $this->error ($message);
            break;
            case "INFO":
                $this->info ($message);
            break;
            case "DEBUG":
                $this->debug ($message);
            break;
            default:
                echo $message;
        }
    }
    public function warning ($message){
        $this->logWithTime("WARNING: " . $message .  PHP_EOL);
    }
    public function error ($message){
        $this->logWithTime("ERROR: " . $message .  PHP_EOL);
    }
    public function info ($message){
        $this->logWithTime("INFO: " . $message .  PHP_EOL);
    }
    public function debug ($message){
        $this->logWithTime("DEBUG: " . $message .  PHP_EOL);
    }

    private function logWithTime ($message){
        echo date("[Y-m-d H:m] ") . $this->origin . " - " . $message;
    }

}

$logger = new MyLogger('TestClass');

$logger->error('dit is een error'); 