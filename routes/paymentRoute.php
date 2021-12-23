<?php

class paymentRoute
{

    /**
     * Manage payment menu's route
     *
     * @return void
     */
    public static function manageRoute(string $content): void
    {
        switch ($content) {
            case "MANDIRI":
                require_once __DIR__ . Router::$public . "payment/mandiri.php";
                break;
            case "GOPAY":
                require_once __DIR__ . Router::$public . "payment/gopay.php";
                break;
            case "BCA";
                require_once __DIR__ . Router::$public . "payment/bca.php";
                break;
            case "OVO";
                require_once __DIR__ . Router::$public . "payment/ovo.php";
                break;
            case "BRI";
                require_once __DIR__ . Router::$public . "payment/bri.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
