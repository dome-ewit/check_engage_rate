<?php

namespace App\Models;

use App\Controllers\influencer_controller;
use CodeIgniter\Model;


class database63_ extends Model
{
	protected $DBGroup = 'database63';

	protected $table = 'influencer';

	public function query_63($txtKeywords, $strNetwork)
	{

		$db63 = new database63_();

		$rawdata_database_63 = $db63->query("SELECT rawdata,follower,post_total 
		FROM influencer_stat_post_recent 
		WHERE network = '$strNetwork' 
		AND influencer_id = '$txtKeywords'
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

}