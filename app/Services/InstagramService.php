<?php

namespace App\Services;

use Phpfastcache\Helper\Psr16Adapter;


class InstagramService
{
    public function authenticateTest()
    {
        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(['verify' => false]), 'gewisstraining', 'GewissTraining2017', new Psr16Adapter('Files'));
        $instagram->login();
        $account = $instagram->getAccountById(3);
        return $account->getUsername();
    }
}