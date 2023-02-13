<?php
namespace App\Controllers;


use App\Models\database24_;
use App\Models\database63_;
use App\Models\Influencer;
use App\Libraries\post;
use App\Libraries\facebook_calculate;
use App\Libraries\instagram_calculate;
use App\Libraries\tiktok_calculate;
use App\Libraries\twitter_calculate;
use App\Libraries\link;


use CodeIgniter\Controller;


class influencer_controller extends BaseController
{

    public function index()
    {

        $txtKeywords = $this->request->getGet('txtKeyword');
        $strNetwork = $this->request->getGet('network');
        $facebook = new Facebook_Calculate($txtKeywords, $strNetwork);
        $instagram = new Instagram_Calculate($txtKeywords, $strNetwork);
        $tiktok = new Tiktok_Calculate($txtKeywords, $strNetwork);
        $twitter = new Twitter_Calculate($txtKeywords, $strNetwork);

        $setdata63 = new database63_();
        $data63 = $setdata63->query_63($txtKeywords, $strNetwork);
        $results['rawdata_database_63'] = $data63['rawdata_database_63'];
        $results['database_63'] = $data63['database_63'];
  
        $setdata24 = new database24_();
        $data24 = $setdata24->query_24($txtKeywords, $strNetwork);
        $results['database_24'] = $data24['database_24'];
        
        //link_profile
        $link_profile = new Link($txtKeywords, $strNetwork);
        $results['link'] = $link_profile->link($txtKeywords, $strNetwork);

        
        $post = new post($txtKeywords, $strNetwork);
        $results['post'] = $post->postt($txtKeywords, $strNetwork);


        if ($strNetwork == 'facebook') {
            $results['data'] = $facebook->Facebook_Engage($txtKeywords, $strNetwork);

        }

        if ($strNetwork == 'instagram') {
            $results['data'] = $instagram->Instagram_Engage($txtKeywords, $strNetwork);
        }


        if ($strNetwork == 'tiktok') {
            $results['data'] = $tiktok->Tiktok_Engage($txtKeywords, $strNetwork);
        }

        if ($strNetwork == 'twitter') {
            $results['data'] = $twitter->Twitter_Engage($txtKeywords, $strNetwork);
        }
        return view('view', $results);


    }
}