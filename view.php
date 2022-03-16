<?php 

include('layouts/header.php');

$id = $_GET['id'];
$name = $_GET['name'];

$sql = "SELECT id,Name,Symbol,price,rank,marketCap,priceChangePercentage24h,totalSupply,ytdPriceChangePercentage
        FROM test_cryptos_info WHERE id = '$id'";
$result = $conn->query($sql);

?>

<style>
    .list-group-item{
        padding: 0 !important;
    }
    .title{
        padding: 10px;
    }
    .value{
        color: #0b0a0a;
        background-color: #00ffaf5c;
        padding: 10px;
    }
</style>

<div class="container">

    <div class="card mt-5">
        <div class="card-header pt-2 pb-2">
            <strong class="alert alert-succes m-0 float-left"><i class="fa fa-book"></i><?= ucfirst($name)?> Details</strong>
            <a class="btn btn-danger float-right" href="/crypto"><b><< Back</b></a>
        </div>
        <div class="card-body">
            <?php while($row = $result->fetch_assoc()){ ?>
                    <!-- name,tiket,ranking,price,marketcap,24h%,7% -->
                    <div id="list-example">
                        <ul class="list-group">
                            <li class="list-group-item d-flex row">
                                <div class="col-lg-6 col-md-6 col-sm-6 title"><strong>Name</strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 value"><span class=""><?=$row['Name']?></span></div>
                            </li>
                            <li class="list-group-item d-flex row">
                                <div class="col-lg-6 col-md-6 col-sm-6 title"><strong>Ranking</strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 value"><span class=""><?= '#'.$row['rank']?></span></div>
                            </li>
                            <li class="list-group-item d-flex row">
                                <div class="col-lg-6 col-md-6 col-sm-6 title"><strong>Price</strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 value"><span class=""><?= $row['price'] ?></span></div>
                            </li>
                            <li class="list-group-item d-flex row">
                                <div class="col-lg-6 col-md-6 col-sm-6 title"><strong>Market Cap</strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 value"><span class=""><?=$row['marketCap']?></span></div>
                            </li>
                            <li class="list-group-item d-flex row">
                                <div class="col-lg-6 col-md-6 col-sm-6 title"><strong>Price change percentage 24 hour</strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 value"><span class=""><?= $row['priceChangePercentage24h']?></span></div>
                            </li>
                            <li class="list-group-item d-flex row">
                                <div class="col-lg-6 col-md-6 col-sm-6 title"><strong>Price change percentage 1 year</strong></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 value"><span class=""><?= $row['ytdPriceChangePercentage'] ?></span></div>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>

<?php include('layouts/footer.php'); ?>
