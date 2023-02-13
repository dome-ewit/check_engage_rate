<?php
namespace App\Libraries;

use App\Models\database24_;
use App\Models\database63_;

class Link
{
   public function calculateEngage($txtKeywords, $strNetwork)
   {
      $setdata63 = new database63_();
      $data63 = $setdata63->query_63($txtKeywords, $strNetwork);
      $results['rawdata_database_63'] = $data63['rawdata_database_63'];
      $results['database_63'] = $data63['database_63'];

      $setdata24 = new database24_();
      $data24 = $setdata24->query_24($txtKeywords, $strNetwork);
      $results['database_24'] = $data24['database_24'];

      return $results;
   }

   public function link($txtKeywords, $strNetwork)
   {
      $link_profile = new link();

      $results = $link_profile->calculateEngage($txtKeywords, $strNetwork);

      $database_24 = $results['database_24'];
      $rawdata_database_63 = $results['rawdata_database_63'];
      $database_63 = $results['database_63'];

      if ($strNetwork == 'facebook') 
      {
         if ($strNetwork != null) {
            $link["id"] = $database_63[0]["influencer_id"];
            $link["link_profile"] = $database_24[0]["facebook_link"];

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  $link[] = $value_rawdata->link;

               }
            }

         }

      }
      if ($strNetwork == 'instagram') 
      {
         if ($strNetwork != null) 
         {
            $link["id"] = $database_63[0]["influencer_id"];
            $link["link_profile"] = $database_24[0]["instagram_link"];

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  $link[] = $value_rawdata->link;
               }
            }

         }

      }
      if ($strNetwork == 'twitter') 
      {
         if ($strNetwork != null) {
            $link["id"] = $database_63[0]["influencer_id"];
            $link["link_profile"] = $database_24[0]["twitter_link"];

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  $link[] = $value_rawdata->link;
               }
            }

         }

      }
      if ($strNetwork == 'tiktok') 
      {
         if ($strNetwork != null) 
         {
            $link["id"] = $database_63[0]["influencer_id"];
            $link["link_profile"] = $database_24[0]["tiktok_link"];

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  $link[] = $value_rawdata->link;
               }
            }

         }

      }

      return @$link;
   }

}