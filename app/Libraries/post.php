<?php
namespace App\Libraries;

use App\Models\database24_;
use App\Models\database63_;

class post
{
   public function postt($txtKeywords, $strNetwork)
   {
      $setdata63 = new database63_();
      $data63 = $setdata63->query_63($txtKeywords, $strNetwork);
      $results['rawdata_database_63'] = $data63['rawdata_database_63'];
      $results['database_63'] = $data63['database_63'];
      $rawdata_database_63 = $results['rawdata_database_63'];
      $database_63 = $results['database_63'];

      
      $setdata24 = new database24_();
      $data24 = $setdata24->query_24($txtKeywords, $strNetwork);
      $results['database_24'] = $data24['database_24'];
      $database_24 = $results['database_24'];


      if ($strNetwork == 'facebook') 
      {
         $check_linkFB = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["facebook_link"]);

         if($check_linkFB != null) 
         {
            $count_post = 0;

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  
                  $post[$key]['sum_post'] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->share;
                  $post[$key]['link_post'] = $value_rawdata->link;
                  $post[$key]['id_post'] = $value_rawdata->id_post;
                  $post[$key]['like'] = $value_rawdata->like;
                  $post[$key]['comment'] = $value_rawdata->comment;
                  $post[$key]['share'] = $value_rawdata->share;
                  @$post[$key]['view'] = $value_rawdata->view;
                  @$post[$key]['createddate_post'] = $value_rawdata->createddate_post;

               }
            }

         }
         else 
         {
            echo '<script type ="text/JavaScript">';
            echo 'alert("No data Found...")';
            echo '</script>';
          }

      }
      elseif ($strNetwork == 'instagram') 
      {
         $check_linkIG = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["instagram_link"]);

         if($check_linkIG != null)  
         {
            $count_post = 0;

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  
                  $post[$key]['sum_post'] = $count_post + $value_rawdata->like + $value_rawdata->comment;
                  $post[$key]['link_post'] = $value_rawdata->link;
                  $post[$key]['id_post'] = $value_rawdata->id_post;
                  $post[$key]['like'] = $value_rawdata->like;
                  $post[$key]['comment'] = $value_rawdata->comment;
                  @$post[$key]['view'] = $value_rawdata->view;
                  @$post[$key]['createddate_post'] = $value_rawdata->createddate_post;
               }
            }

         }
         else 
         {
            echo '<script type ="text/JavaScript">';
            echo 'alert("No data Found...")';
            echo '</script>';
          }

      }
      elseif ($strNetwork == 'twitter') 
      {
         $check_linkTwitter = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["twitter_link"]);
  
         if($check_linkTwitter != null) 
         {
            $post = array();
            $count_post = 0;
            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {

                  $post[$key]['sum_post'] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->retweet;
                  $post[$key]['link_post'] = $value_rawdata->link;
                  $post[$key]['id_post'] = $value_rawdata->id_post;
                  $post[$key]['like'] = $value_rawdata->like;
                  $post[$key]['comment'] = $value_rawdata->comment;
                  $post[$key]['share'] = $value_rawdata->retweet;
                  @$post[$key]['createddate_post'] = $value_rawdata->createddate_post;
               }
            }

         }
         else 
         {
            echo '<script type ="text/JavaScript">';
            echo 'alert("No data Found...")';
            echo '</script>';
          }

      }
      elseif ($strNetwork == 'tiktok') 
      {
         $check_linkTiktok = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["tiktok_link"]);

         if($check_linkTiktok != null) 
         {
            $count_post = 0;

            foreach ($rawdata_database_63 as $key => $value_63) 
            {
               $rawdata_63 = json_decode($value_63["rawdata"]);

               foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) 
               {
                  
                  $post[$key]['sum_post'] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->share;
                  $post[$key]['link_post'] = $value_rawdata->link;
                  $post[$key]['id_post'] = $value_rawdata->id_post;
                  $post[$key]['like'] = $value_rawdata->like;
                  $post[$key]['comment'] = $value_rawdata->comment;
                  $post[$key]['share'] = $value_rawdata->share;
                  @$post[$key]['view'] = $value_rawdata->view;
                  @$post[$key]['createddate_post'] = $value_rawdata->createddate_post;
               }
            }
         }
         else 
         {
            echo '<script type ="text/JavaScript">';
            echo 'alert("No data Found...")';
            echo '</script>';
          }
      }
      return @$post;
   }

}