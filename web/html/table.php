
<?php

if(isset($_POST['submit2'])){

$name = $_POST['coin_option'];

}

if (isset($_POST['submit'])) {


$name = $_POST['search'];

$name = strtoupper($name);


}
$myCoins = array(
   $name => array ( 'balance' => 0.0093 )
);





// ok now hit the api...
$coinbasePublicAPI = 'https://api.coinmarketcap.com/v1/ticker/';
$coinData = file_get_contents($coinbasePublicAPI);
$coinData = json_decode($coinData, true);
$numCoinbaseCoins = sizeof ($coinData);
$portfolioValue = 0;
?>
 <h3 class="box-title">Currency</h3>
<?php
for ( $xx=0; $xx<$numCoinbaseCoins; $xx++) {
   // this part compares your coins to the data...
   $thisCoinSymbol = $coinData[$xx]['symbol'];
   // if you have it, this var is true...
   $coinHeld = array_key_exists($thisCoinSymbol, $myCoins);
   // comment the next line out & you will see ALL of the coins 
   // returned (not just the ones you own):
   if ( !$coinHeld ) { continue; }
?>   

    <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <div class="table-responsive">
                             <table class="table">
                                     <thead>
                                        <tr>
                                            <th>RANKING</th>
                                            <th>COIN</th>
                                            <th>ABBREVIATION</th>
                                            <!-- Create button !-->
                                            <th>PRICE</th>
                                            <th>PRICE CHANGE 7D</th>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td width="400"><?php echo $coinData[$xx]['rank']; ?></td>
                                            <?php echo '<td class="txt-oflo" width="400">' . $coinData[$xx]['name'] .'</td>'; ?>
                                            <td width="400"><?php echo $thisCoinSymbol ?></td>
                                            <?php $thisCoinPrice = $coinData[$xx]['price_usd'];
                                            echo '<td width="400"><span class="text-success">&#36;' . number_format($thisCoinPrice,2) .'</td>'; ?>
                                            <?php echo '<td width="400">' . $coinData[$xx]['percent_change_7d'] .'%</td>'; ?> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

<?php
}
?>

