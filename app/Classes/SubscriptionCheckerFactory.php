<?php

namespace App\Classes;

use App\Classes\Checker\AppleStore;
use App\Classes\Checker\GooglePlay;
use App\Classes\Contract\CheckerInterface as IChecker;
use App\Models\Platform;

class SubscriptionCheckerFactory
{
    private static GooglePlay $google;
    private static AppleStore $apple;

    /**
     * @param string $url
     * @return GooglePlay
     */
    private static function GetGoogle($checker): GooglePlay
    {
        return self::$google ?? self::$google = new GooglePlay($checker);
    }

    /**
     * @param string $url
     * @return AppleStore
     */
    private static function GetApple($checker): AppleStore
    {
        return self::$apple ?? self::$apple = new AppleStore($checker);
    }

    /**
     * @param Platform $checker app market's name
     * @return IChecker
     * @throws \Exception
     */
    public static function Build(Platform $checker): IChecker
    {
         return match($checker->name){
            'Android' => self::GetGoogle($checker),
            'ios'  => self::GetApple($checker),
             default => throw new \Exception('not yet defined requested checker',500)
        };
    }
}
