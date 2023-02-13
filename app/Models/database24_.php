<?php

namespace App\Models;

use App\Controllers\influencer_controller;
use CodeIgniter\Model;

class database24_ extends Model
{
    protected $DBGroup = 'database24';
    protected $table = 'influencer';

    public function query_24($txtKeywords, $strNetwork)
    {

        $db24 = new database24_();

        $database_24 = $db24->query("SELECT facebook_engage_average,facebook_engage_rate,facebook_link,facebook_followed
        ,instagram_engage_average, instagram_engage_rate,instagram_link,instagram_followed_by
        ,twitter_engage_average,twitter_engage_rate,twitter_link,twitter_followers
        ,tiktok_engage_average,tiktok_engage_rate,tiktok_link,tiktok_followers
        FROM influencer WHERE   influencer_id = '$txtKeywords'
        ORDER BY created_date DESC
        LIMIT 0, 1");

        $results24['database_24'] = $database_24->getResultArray();

        return $results24;
    }

}