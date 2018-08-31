 <?php
$name="BTC";

$myCoins = array(
   $name => array ( 'balance' => 0.0093 )
);
// ok now hit the api...
$coinbasePublicAPI = 'https://api.coinmarketcap.com/v1/ticker/';
$coinData = file_get_contents($coinbasePublicAPI);
$coinData = json_decode($coinData, true);
$numCoinbaseCoins = sizeof ($coinData);
$portfolioValue = 0;

for ( $xx=0; $xx<$numCoinbaseCoins; $xx++) {
   // this part compares your coins to the data...
   $thisCoinSymbol = $coinData[$xx]['symbol'];
   // if you have it, this var is true...
   $coinHeld = array_key_exists($thisCoinSymbol, $myCoins);
   // comment the next line out & you will see ALL of the coins 
   // returned (not just the ones you own):
$cat_options = <<<DELIMITER

<option value="{$thisCoinSymbol}">{$coinData[$xx]['name']}</option>


DELIMITER;

echo $cat_options;

}



 ?>

