<?php

include('layouts/header.php');

$sql = "SELECT Name,Symbol,price,rank,marketCap,priceChangePercentage24h,totalSupply,ytdPriceChangePercentage
        FROM test_cryptos_info";
$result = $conn->query($sql);
$table_content = '';

if(!empty($result)){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $Name = $row['Name'];
            $table_content .= "
                <tr>
                    <td>".$row['Name']."</td>
                    <td>".$row['Symbol']."</td>
                    <td>".$row['rank']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['marketCap']."</td>
                    <td>".$row['priceChangePercentage24h']."</td>
                    <td>".$row['totalSupply']."</td>
                    <td>".$row['ytdPriceChangePercentage']."</td>
                    <td><a href='view.php?id=".$Name."' class='btn btn-sm btn-success'><i class='fa fa-eye'><i> View</a></td>
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

<div class="container-fluid">
    <div class="row table-responsive">
        <table id="cryptoTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Symbol</th>
                    <th>Rank</th>
                    <th>Price</th>
                    <th>Marketcap</th>
                    <th>Price Change Percentage 24h</th>
                    <th>Total Supply</th>
                    <th>Ytd Price Change Percentage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $table_content ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('layouts/footer.php'); ?>