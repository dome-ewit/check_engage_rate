<?php
namespace App\Libraries;

use App\Models\database63_;
use App\Models\database24_;

class Twitter_Calculate
{
   public function Twitter_Engage($txtKeywords, $strNetwork)
   {
      $query63 = new database63_();

      $data63 = $query63->query_63($txtKeywords, $strNetwork);
      $results['rawdata_database_63'] = $data63['rawdata_database_63'];
      $results['database_63'] = $data63['database_63'];

      $query24 = new database24_();
      $data24 = $query24->query_24($txtKeywords, $strNetwork);
      $results['database_24'] = $data24['database_24'];

      if ($strNetwork == 'twitter') {
         foreach ($results['rawdata_database_63'] as $key => $value_63) {
            $rawdata_63 = json_decode($value_63["rawdata"]);
            $follower_63 = json_decode($value_63["follower"]);
            $post_total = json_decode($value_63["post_total"]);
            $total_sum = array();
            $i = 1;

            foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
               $count_post = 0;
               $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->retweet;
               $i++;
            }

            $posts_tot = round(count($rawdata_63));
            if ($posts_tot <= 4) 
            {
               sort($total_sum, SORT_NUMERIC);
               $sum = array_sum($total_sum);
               if (count($total_sum) != 0) 
               {
                  $engage_average_63 = ($sum / count($total_sum));
                  if ($follower_63 != 0) 
                  {
                     $engage_rate = number_format((($engage_average_63 / $follower_63) * 100), 2);
                  }
               }
            } 
            elseif ($posts_tot > 4 && $posts_tot <= 14) 
            {
               sort($total_sum, SORT_NUMERIC);
               $sum = array_sum($total_sum);
               array_shift($total_sum);
               array_pop($total_sum);
               $sum = array_sum($total_sum);
               if (count($total_sum) != 0) 
               {
                  $engage_average_63 = @($sum / count($total_sum));
                  if ($follower_63 != 0) 
                  {
                     $engage_rate = number_format((($engage_average_63 / $follower_63) * 100), 2);
                  }
               }
            } 
            elseif ($posts_tot > 14) 
            {
               sort($total_sum, SORT_NUMERIC);
               array_shift($total_sum);
               array_shift($total_sum);
               array_pop($total_sum);
               array_pop($total_sum);
               $sum = array_sum($total_sum);
               if (count($total_sum) != 0)
               {
                  $engage_average_63 = @($sum / count($total_sum));
                  if ($follower_63 != 0) 
                  {
                     $engage_rate = number_format((($engage_average_63 / $follower_63) * 100), 2);
                  }
               }
            }

            @$twitter_results['sum'] = $sum;
            @$twitter_results['engage_average_63'] = $engage_average_63;
            @$twitter_results['engage_rate_63'] = $engage_rate;
            @$twitter_results['total_sum'] = $total_sum;
            @$twitter_results['post_total'] = $post_total;
         }

         foreach ($results['database_24'] as $key => $value24) 
         {
            $twitter_engage_average = json_decode($value24["twitter_engage_average"]);
            $twitter_engage_rate = json_decode($value24["twitter_engage_rate"]);
            $twitter_follower = json_decode($value24["twitter_followers"]);
            $twitter_engage_average = number_format($twitter_engage_average, 2);
            $twitter_engage_rate = number_format($twitter_engage_rate, 2);
         }
         
         @$diff= ($engage_rate-$twitter_engage_rate);
         @$twitter_results['diff'] = $diff;
         @$twitter_results['engage_average_24'] = $twitter_engage_average;
         @$twitter_results['engage_rate_24'] = $twitter_engage_rate;
         @$twitter_results['follower_63'] = $follower_63;
         @$twitter_results['follower_24'] = $twitter_follower;
         @$twitter_results['rawdata_63'] = $rawdata_63;
      }
      return @$twitter_results;
   }
}