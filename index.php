<?php

include('layouts/header.php');

$sql = "SELECT id,Name,Symbol,price,rank,marketCap,priceChangePercentage24h,totalSupply,ytdPriceChangePercentage
        FROM test_cryptos_info";
$result = $conn->query($sql);
$table_content = '';

if(!empty($result)){
    if($result->num_rows > 0){
        $i = 0;
        while($row = $result->fetch_assoc()){
            $i++;
            $id = $row['id'];
            $name = $row['Name'];
            $table_content .= "
                <tr>
                    <td>".$i."</td>
                    <td><a href='view.php?id=".$id."&name=".$name."' style='text-decoration:none;color:#000;' title='View details'>".$row['Name']."</a></td>
                    <td>".$row['Symbol']."</td>
                    <td>".$row['rank']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['marketCap']."</td>
                    <td>".$row['priceChangePercentage24h']."</td>
                    <td>".$row['totalSupply']."</td>
                    <td>".$row['ytdPriceChangePercentage']."</td>
                </tr>
            ";
        }
    }
    else{
        $table_content .= 'No data found.';
    }
}
else{
    $table_content .= 'No data found.';
}

?>

<div class="container">

    <div class="card mt-5">
        <div class="card-header pt-2 pb-2">
            <strong class="alert alert-succes m-0 m-auto d-table">
                <i class="fa fa-ring"></i> Cryptocurrency List
            </strong>
        </div>
        <div class="card-body">
            <div class="row table-responsive">
                <table id="cryptoTable" class="data table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Symbol</th>
                            <th>Rank</th>
                            <th>Price</th>
                            <th>Marketcap</th>
                            <th>24h%</th>
                            <th>Total Supply</th>
                            <th>Ytd%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $table_content ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php'); ?>