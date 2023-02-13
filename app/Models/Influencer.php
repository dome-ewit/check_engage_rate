<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

use CodeIgniter\Controllers\influencer_controller;

class Influencer extends Model
{

	public function query_63(){

		$db63 = db_connect('default');
		$txtKeywords = $this->request->getGet('txtKeyword');
        $strNetwork = $this->request->getGet('network');
		
		$rawdata_database_63 = $db63->query("SELECT rawdata,follower FROM influencer_stat_post_recent WHERE network = '$strNetwork' AND influencer_id = '$txtKeywords'
        ORDER BY create_date DESC
        LIMIT 0,1");
            

		$database_63 = $db63->query("SELECT influencer_id, network, follower, post_total,create_date 
		FROM influencer_stat_post_recent 
		WHERE influencer_id = '$txtKeywords'
		ORDER BY create_date DESC
		LIMIT 0, 50");

		$results63['rawdata_database_63'] = $rawdata_database_63->getResultArray();
        $results63['database_63'] = $database_63->getResultArray();
		return $results63;


	}

	public function query_24(){


		$db24 = db_connect('database24');
		$txtKeywords = $this->request->getGet('txtKeyword');

		$builder = $this->$db24->select('facebook_engage_average,facebook_engage_rate,facebook_link
        ,instagram_engage_average, instagram_engage_rate,instagram_link
        ,twitter_engage_average,twitter_engage_rate,twitter_link
        ,tiktok_engage_average,tiktok_engage_rate,tiktok_link');
        $builder->where('influencer_id',$txtKeywords);
        $builder->orderBy('create_date', 'DESC');
        $builder->limit(0, 1);
        $database_24 = $builder->get();

		$results24['database_24'] = $database_24->getResultArray();
		return $results24;
	}

}
