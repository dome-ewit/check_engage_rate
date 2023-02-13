<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <title>influencer</title>
</head>
<body>
  
<?php
$strNetwork = null;
$strinfliencer_id = null;

if (isset($_GET["network"])) {
  $strNetwork = $_GET["network"];
}
if (isset($_GET["txtKeyword"])) {
  $strinfliencer_id = $_GET["txtKeyword"];

}
?>

<div class="contenner"> 
  <form method="get" action="">
    <div class="heard">
      <header class="p-3 text-white" style="background-color:#616161;">
        <div class="dropdown-itim">
            <p align='center' class = "blockquote">ID-influencer
                <input type="text" name="txtKeyword"  class="form" value="<?php echo $strinfliencer_id; ?>" placeholder="Search.....">&nbsp;&nbsp;&nbsp;&nbsp;
                  <select type="text" name="network" class="btn btn-light dropdown-toggle btn-lg">
                    <option value="">Select Network</option>
                    <option value="facebook">Facebook</option>
                    <option value="instagram">Instagram</option>
                    <option value="twitter">Twitter</option>
                    <option value="tiktok">Tiktok</option>
                  </select>&nbsp;&nbsp;
                <button class="btn btn-success btn-lg" type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg> Search</button>
            </p> 
          </div> 
      </header>
    </div>
  </form><br>
</div>

<div style="font-family:Comic sans MS" >
<?php


//Facebook
if ($strNetwork == 'facebook') 
{

  $website_facebook = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["facebook_link"]);

  if($website_facebook != null) {
    $facebook_link = $database_24[0]["facebook_link"];
    echo "<h3 align='center'><a href= $facebook_link target='_blank' ><button type='button' class='btn btn-outline-primary btn-lg'>
      <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-facebook' viewBox='0 0 16 16'>
      <path d='M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z'></path>
      </svg> $strinfliencer_id $strNetwork </button></a></h3>";


  ?>

    
  <table    align='center'   class="table table-bordered table-hover " >
  <thead align='center'   class="bg-primary p-2 text-dark bg-opacity-25 ">
  <th >No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>Share</th>
  <th>View</th>
  <th>Createddate_post</th>
  <th>total</th>
  </thead>
  <?php
    foreach ($rawdata_database_63 as $key => $value_63) {
      $rawdata_63 = json_decode($value_63["rawdata"]);
      $follower_63 = json_decode($value_63["follower"]);




      $total_sum = array();


      echo "</pre>";
      $i = 1;

      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {

        $count_post = 0;
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->share;
        
  ?>
              <tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
              <td><?php echo $i ?></td>
              <td><?php echo "<a href= $value_rawdata->link target='_blank' ><button type='button' class='btn btn-outline-primary'> <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-facebook' viewBox='0 0 16 16'>
              <path d='M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z'></path>
              </svg> $value_rawdata->id_post</button></a>" ?> </td>
              
              <td><?php echo $value_rawdata->like ?></td> 
              <td><?php echo $value_rawdata->comment ?></td> 
              <td><?php echo $value_rawdata->share ?></td> 
              <td><?php echo @"$value_rawdata->view" ?></td> 
              <td><?php echo @"$value_rawdata->createddate_post" ?></td> 
              <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment) + intval($value_rawdata->share)) ?></td> 
              </tr>
            <?php
        $i++;
      }

      $posts_tot = round(count($rawdata_63));
            ?>
            
            <table    align='center'   class="table table-bordered table-hover">
            <thead  align='center' class="bg-primary p-2 text-dark bg-opacity-25">
            <th>server_name</th>
            <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
            <th>Engage_Average</th>
            <th>follower</th>
            <th>Engage_Rate</th>
            </thead>
            </thead>
            <?php

      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = ($sum / count($total_sum));
          // var_dump($follower_63);
            ?>

                  <tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
                  
                  <td>122.155.166.63</td>
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }

      }

      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        $summ = array_sum($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));


                    ?>
                
                  <tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
                  <td>122.155.166.63</td>
                  <td><?php echo number_format($sum) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr>
                    <?php
          }
        }

      }
      if ($posts_tot > 14) {

        $sum = array_sum($total_sum);
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
                    ?>

                  <tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
                  <td>122.155.166.63</td>
                  
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td>
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></th>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }
      }




    }

    foreach ($database_24 as $key => $value24) {
      $facebook_engage_average = json_decode($value24["facebook_engage_average"]);
      $facebook_engage_rate = json_decode($value24["facebook_engage_rate"]);
                    ?>
      <table    align='center'   class="table table-bordered table-hover">
      <thead  align='center' class="bg-primary p-2 text-dark bg-opacity-25">
      <th>server_name</th>
      
      <th>Engage_Average</th>
      
      <th>Engage_Rate</th>
  </thead>
      <tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
      <td>192.168.11.24</td>
       
      <td><?php echo number_format($facebook_engage_average, 2) ?></td>
       
      <td><?php echo number_format($facebook_engage_rate, 2) ?></td></tr>
      <?php
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("No data Found...")';
    echo '</script>';
    echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
  }


}

// Instagram
else if ($strNetwork == 'instagram') 
{

  $website_instagram = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["instagram_link"]);

  if($website_instagram != null) 
  {
    $instagram_link = $database_24[0]["instagram_link"];
    echo "<h3 align='center'><a href= $instagram_link target='_blank'><button type='button' class='btn btn-outline-danger btn-lg'>
      <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-instagram' viewBox='0 0 16 16'>
      <path d='M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z'></path>
      </svg>
         $strinfliencer_id $strNetwork
      </button></a></h3>";


      ?>

    
  <table    align='center'   class="table table-bordered table-hover" >
  <thead align='center'   class="bg-danger p-2 text-dark bg-opacity-25">
  <th>No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>View</th>
  <th>Createddate_post</th>
  <th>total</th>
  </thead>

  <?php

    foreach ($rawdata_database_63 as $key => $value_63) {
      $rawdata_63 = json_decode($value_63["rawdata"]);
      $follower_63 = json_decode($value_63["follower"]);
      $total_sum = array();
      echo "</pre>";
      $i = 1;

      $count_post = 0;
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment;
  ?>
            <tr align='center' class="bg-danger p-2 text-dark bg-opacity-10">
            <td><?php echo $i ?></td>
            <td><?php echo "<a href= $value_rawdata->link target='_blank' ><button type='button' class='btn btn-outline-danger'> <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-instagram' viewBox='0 0 16 16'>
    <path d='M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z'></path>
  </svg> $value_rawdata->id_post</button></a>" ?> </td>
            <td><?php echo number_format($value_rawdata->like) ?></td> 
            <td><?php echo number_format($value_rawdata->comment) ?></td>
            <td><?php echo number_format($value_rawdata->view) ?></td> 
            <td><?php echo @($value_rawdata->createddate_post) ?></td> 
            <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment)) ?></td> </tr>
            <?php
        $i++;
      }
      $posts_tot = round(count($rawdata_63));
            ?>

            <table    align='center'   class="table table-bordered table-hover">
            <thead  align='center' class="bg-danger p-2 text-dark bg-opacity-25">
            <th>server_name</th>
            <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
            <th>Engage_Average</th>
            <th>follower</th>
            <th>Engage_Rate</th>
            </thead>
            <?php

      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
            ?>

                  <tr align='center' class="bg-danger p-2 text-dark bg-opacity-10">
                
                  <td>122.155.166.63</td>
                
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr>
                    <?php
          }
        }


      }
      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
                    ?>
                  <tr align='center' class="bg-danger p-2 text-dark bg-opacity-10">
                  
                  <td>122.155.166.63</td>
                  
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }

      }
      if ($posts_tot > 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
                    ?>
                  <tr align='center' class="bg-danger p-2 text-dark bg-opacity-10">
                  
                  <td>122.155.166.63</td>
                  
                  <td><?php echo number_format($sum, 2) ?></td>
                  <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
                  <td><?php echo number_format($follower_63) ?></td> 
                  <?php if ($follower_63 == 0) {
                  ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }


      }
    }


    foreach ($database_24 as $key => $value24) {
      $instagram_engage_average = json_decode($value24["instagram_engage_average"]);
      $instagram_engage_rate = json_decode($value24["instagram_engage_rate"]);
                    ?>
    <table    align='center'   class="  table table-bordered table-hover">
    <thead  align='center' class="bg-danger p-2 text-dark bg-opacity-25">
    <th>server_name</th>
   
    <th>Engage_Average</th>
    
    <th>Engage_Rate</th>
    </thead>
    <tr align='center' class="bg-danger p-2 text-dark bg-opacity-10">
    <td>192.168.11.24</td>
     
    <td><?php echo number_format($instagram_engage_average, 2) ?></td>
     
    <td><?php echo number_format($instagram_engage_rate, 2) ?></td>
  </tr>
    <?php
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("No data Found...")';
    echo '</script>';
    echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
  }
}

//Twitter
else if ($strNetwork == 'twitter') 
{

  $website_twitter = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["twitter_link"]);
  
    if($website_twitter != null) 
      {
      $twitter_link = $database_24[0]["twitter_link"];
      echo "<h3 align='center'><a href= $twitter_link target='_blank'><button type='button' class='btn btn-outline-info btn-lg'>
      <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-twitter' viewBox='0 0 16 16'>
      <path d='M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z'></path>
      </svg>
        $strinfliencer_id $strNetwork
      </button></a></h3>";

    ?>

    
  <table    align='center'   class="table table-bordered table-hover" >
  <thead align='center'   class="bg-info p-2 text-dark bg-opacity-25">
  <th>No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>retweet</th>
  <th>Createddate_post</th>
  <th>total</th>
  </thead>
  
  <?php
    foreach ($rawdata_database_63 as $key => $value_63) {
      $rawdata_63 = json_decode($value_63["rawdata"]);
      $follower_63 = json_decode($value_63["follower"]);
      
      $total_sum = array();
      echo "</pre>";
      $i = 1;

      $count_post = 0;
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->retweet;

  ?>
          <tr align='center' class="bg-info p-2 text-dark bg-opacity-10">
          <td><?php echo $i ?></td>
          <td><?php echo "<a href= $value_rawdata->link target='_blank' ><button type='button' class='btn btn-outline-info'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-twitter' viewBox='0 0 16 16'>
  <path d='M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z'></path>
  </svg> $value_rawdata->id_post</button></a>" ?> </td>
          <td><?php echo number_format($value_rawdata->like) ?></td> 
          <td><?php echo number_format($value_rawdata->comment) ?></td> 
          <td><?php echo number_format($value_rawdata->retweet) ?></td> 
          <td><?php echo @$value_rawdata->createddate_post ?></td> 
          <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment) + intval($value_rawdata->retweet)) ?></td> 
          </tr>
          <?php
        $i++;

      }

      $posts_tot = round(count($rawdata_63)); ?>

        <table    align='center'   class="  table table-bordered table-hover">
        
          <thead  align='center' class="bg-info p-2 text-dark bg-opacity-25">
        <th>server_name</th>
        <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
        <th>Engage_Average</th>
        <th>follower</th>
        <th>Engage_Rate</th>
        </thead>
        <?php

      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));


        ?>
              
              <tr align='center' class="bg-info p-2 text-dark bg-opacity-10">
              
              <td>122.155.166.63</td>
            
              <td><?php echo number_format($sum, 2) ?></td>
              <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
              <td><?php echo number_format($follower_63) ?></td> 
              
              <?php if ($follower_63 == 0) {
              ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }

      }


      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
          
                    ?>
              <tr align='center' class="bg-info p-2 text-dark bg-opacity-10">
              
              <td>122.155.166.63</td>
              
              <td><?php echo number_format($sum, 2) ?></td>
              <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
              <td><?php echo number_format($follower_63) ?></td> 
              
              <?php if ($follower_63 == 0) {
              ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }

      }
      if ($posts_tot > 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
                    ?>
              <tr align='center' class="bg-info p-2 text-dark bg-opacity-10" >
              <td>122.155.166.63</td>
              
              
              <td><?php echo number_format($sum, 2) ?></td>
              <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
              <td><?php echo number_format($follower_63) ?></td> 
              
              <?php if ($follower_63 == 0) {
              ?>

                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                  </tr>
                  <?php
          } else {
                  ?>
                    
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr><?php
          }
        }

      }


    }




    foreach ($database_24 as $key => $value24) {
      $twitter_engage_average = json_decode($value24["twitter_engage_average"]);
      $twitter_engage_rate = json_decode($value24["twitter_engage_rate"]);
                    ?>
  <table    align='center'   class="  table table-bordered table-hover">
  <thead  align='center' class="bg-info p-2 text-dark bg-opacity-25">
  <th>server_name</th>

  <th>Engage_Average</th>

  <th>Engage_Rate</th>
  </thead>
  <tr align='center' class="bg-info p-2 text-dark bg-opacity-10">
  <td>192.168.11.24</td>
   
  <td><?php echo number_format($twitter_engage_average, 2) ?></td>
   
  <td><?php echo number_format($twitter_engage_rate, 2) ?></td>
  </tr>
  <?php
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("No data Found...")';
    echo '</script>';
    echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
  }

}

//Tiktok
else if ($strNetwork == 'tiktok') 
{
 
  $website_tiktok = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $database_24[0]["tiktok_link"]);

    if($website_tiktok != null) 
    {
        $tiktok_link = $database_24[0]["tiktok_link"];
        echo "<h3 align='center'><a href= $tiktok_link target='_blank'><button type='button' class='btn btn-outline-dark btn-lg'>
        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-tiktok' viewBox='0 0 16 16'>
        <path d='M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z'></path>
        </svg>  
        $strinfliencer_id   $strNetwork</button></a></h3>";

  ?> 
  <table  align='center'   class="table table-bordered table-hover" >
  <thead align='center'   class="bg-dark p-2 text-dark bg-opacity-50">
    <th>No</th>
    <th>Id_post</th>
    <th>Like</th>
    <th>Comment</th>
    <th>view</th>
    <th>share</th>
    <th>Createddate_post</th>
    <th>total</th>
  </thead>
  <?php
    foreach ($rawdata_database_63 as $key => $value_63) {
      $rawdata_63 = json_decode($value_63["rawdata"]);
      $follower_63 = json_decode($value_63["follower"]);
      
      $total_sum = array();
      echo "</pre>";
      $i = 1;
      $count_post = 0;
      foreach (array_slice($rawdata_63, 0, 20) as $key => $value_rawdata) {
        $total_sum[$key] = $count_post + $value_rawdata->like + $value_rawdata->comment + $value_rawdata->share;
  ?>
          <tr align='center' class="bg-dark p-2 text-dark bg-opacity-10" >
            <td><?php echo $i ?></td>
            <td><?php echo "<a href= $value_rawdata->link target='_blank' ><button type='button' class='btn btn-outline-dark'>  <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-tiktok' viewBox='0 0 16 16'>
                            <path d='M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z'></path>
                            </svg>$value_rawdata->id_post</button></a>" ?> </td>
            <td><?php echo number_format($value_rawdata->like) ?></td> 
            <td><?php echo number_format($value_rawdata->comment) ?></td> 
            <td><?php echo number_format($value_rawdata->view) ?></td> 
            <td><?php echo number_format($value_rawdata->share) ?></td> 
            <td><?php echo @$value_rawdata->createddate_post ?></td> 
            <td><?php echo number_format(intval($value_rawdata->like) + intval($value_rawdata->comment) + intval($value_rawdata->share)) ?></td>
          </tr>
          <?php
        $i++;
      }
      $posts_tot = round(count($rawdata_63));
          ?>
          <table    align='center'  class="  table table-bordered table-hover">
          <thead  align='center' class="bg-dark p-2 text-dark bg-opacity-50">
            <th>server_name</th>
            <th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
            <th>Engage_Average</th>
            <th>follower</th>
            <th>Engage_Rate</th>
          </thead>

          <?php
      if ($posts_tot <= 4) {
        sort($total_sum, SORT_NUMERIC);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
          ?>
            <tr align='center' class="bg-dark p-2 text-dark bg-opacity-10">
            <td>122.155.166.63</td>
            <td><?php echo number_format($sum, 2) ?></td>
            <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
            <td><?php echo number_format($follower_63) ?></td> 

            <?php if ($follower_63 == 0) { ?>

              <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
              </tr>
              <?php
          } else {
              ?>
                <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                </tr> <?php
          }
        }

      }
      if ($posts_tot > 4 && $posts_tot <= 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          $engage_average_63 = @($sum / count($total_sum));
                ?>
            <tr align='center' class="bg-dark p-2 text-dark bg-opacity-10">
            <td>122.155.166.63</td>
            <td><?php echo number_format($sum, 2) ?></td>
            <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>

            <td><?php echo number_format($follower_63) ?></td> 

            <?php if ($follower_63 == 0) { ?>
                <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
                </tr>
                <?php
          } else {
                ?>  
                  <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                  </tr><?php
          }
        }

      }
      if ($posts_tot > 14) {
        sort($total_sum, SORT_NUMERIC);
        array_shift($total_sum);
        array_shift($total_sum);
        array_pop($total_sum);
        array_pop($total_sum);
        $sum = array_sum($total_sum);
        if (count($total_sum) != 0) {
          
          $engage_average_63 = @($sum / count($total_sum));
                  ?>
            <tr align='center' class="bg-dark p-2 text-dark bg-opacity-10">
            <td>122.155.166.63</td>
            <td><?php echo number_format($sum, 2) ?></td>
            <td><?php echo number_format($sum) . " / " . count($total_sum) . " = " . number_format($engage_average_63, 2) ?></td>
            <td><?php echo number_format($follower_63) ?></td> 
            <?php if ($follower_63 == 0) {
            ?>
              <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", "0.00" ?></td>
              </tr>
              <?php
          } else {
              ?>
                    <td><?php echo "(", number_format($engage_average_63, 2), "&nbsp;&nbsp;/&nbsp;&nbsp;", number_format($follower_63), ")", " * ", "100", " = ", number_format((($engage_average_63 / $follower_63) * 100), 2) ?></td>
                    </tr> <?php
          }

        }

      }



    }
    foreach ($database_24 as $key => $value24) {
      $tiktok_engage_average = json_decode($value24["tiktok_engage_average"]);
      $tiktok_engage_rate = json_decode($value24["tiktok_engage_rate"]);
                    ?>
    <table    align='center'   class="  table table-bordered table-hover">
    <thead  align='center' class="bg-dark p-2 text-dark bg-opacity-50">
      <th>server_name</th>
      <th>Engage_Average</th>
      <th>Engage_Rate</th>
    </thead>
    <tr align='center' class="bg-dark p-2 text-dark bg-opacity-10">
      <td>192.168.11.24</td>
      <td><?php echo number_format($tiktok_engage_average, 2) ?></td>
      <td><?php echo number_format($tiktok_engage_rate, 2) ?></td>
    </tr>
    <?php
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("No data Found...")';
    echo '</script>';
    echo "<center><h2>No data Found...</h2></center>&nbsp;&nbsp;";
  }
} 
else 
{
  $i = 1;
    ?>
  <table    align='center' class="  table table-bordered table-hover">
  <thead  align='center' class="table-primary">
    <td>No</td>
    <td>Influencer_id</td>
    <td>Network</th>
    <td>Follower</th>
    <td>Post_Total</td>
    <td>Create_Date</td>
  </thead>
  <?php
  foreach ( $database_63 as $key => $value24) {
    $influencer_id = $value24["influencer_id"];
    $network = $value24["network"];
    $follower = $value24["follower"];
    $post_total = $value24["post_total"];
    $create_date = $value24["create_date"]; ?>
    <tr align='center' class="table-light">
      <td><?php echo $i ?></td>
      <td><?php echo $influencer_id ?></td> 
      <td><?php echo $network ?></td> 
      <td><?php echo number_format($follower) ?></td> 
      <td><?php echo number_format($post_total) ?></td> 
      <td><?php echo $create_date ?></td> 
    </tr>
    <?php
    $i++;
  }
}

    ?>
</div>
</body>
</html>