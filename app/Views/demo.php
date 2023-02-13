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


<h3 align='center'><a href= <?= @$link["link_profile"]?> target='_blank' ><button type='button' class='btn btn-outline-primary btn-lg'>
      <?= @$link["id"] ?> </button></a></h3>

<table    align='center'   class="table table-bordered table-hover " >
  <thead align='center'   class="bg-primary p-2 text-dark bg-opacity-25 ">
    
  <th >No</th>
  <th>Id_post</th>
  <th>Like</th>
  <th>Comment</th>
  <th>Share/retweet</th>
  <th>View</th>
  <th>Createddate_post</th>
  <th>total</th>
  </thead>


<?php
        
$i = 1;
foreach ($post as $key => $value) {
        
?>
          <tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
          <td><?php echo $i ?></td>
          <td><?php echo @$value['id_post'] ?> </td>
          <td><?php echo @$value['like'] ?> </td>
          <td><?php echo @$value['comment'] ?> </td>
          <td><?php echo @$value['share'] ?> </td>
          <td><?php echo @$value['view'] ?> </td>
          <td><?php echo @$value['createddate_post'] ?> </td>
          <td><?php echo @$value['sum_post'] ?> </td>
          <?php
    $i++;
 
}


?>


<table    align='center'   class="table table-bordered table-hover">
<thead  align='center' class="bg-primary p-2 text-dark bg-opacity-25">
<th>server_name</th>
<th>หลังจากลบโพสต์มากสุดและน้อยสุด</th>
<th>Engage_Average</th>
<th>follower</th>
<th>Engage_Rate</th>
</thead>
<tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
  <td>122.155.166.63</td>
  <td><?= @$data["sum"]?></td>
  <td><?= @$data["engage_average_63"]?></td>
  <td><?= @$data["follower_63"]?></td>
  <td><?= @$data["engage_rate_63"]?></td>
</tr>

<table    align='center'   class="table table-bordered table-hover">
<thead  align='center' class="bg-primary p-2 text-dark bg-opacity-25">
<th>server_name</th>
<th>Engage_Average</th>
<th>follower</th>
<th>Engage_Rate</th>
</thead>
<tr align='center' class="bg-primary p-2 text-dark bg-opacity-10">
  <td>192.168.11.24</td>
  <td><?= @$data["engage_average_24"]?></td>
  <td><?= @$data["follower_24"]?></td>
  <td><?= @$data["engage_rate_24"]?></td>
</tr>

</body>
</html>