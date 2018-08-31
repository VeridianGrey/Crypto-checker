 <?php
 $name ="BTC";

if(isset($_POST['submit2'])){

$name = $_POST['coin_option'];
}
if(isset($_POST['submit'])){

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
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title"><?php echo $thisCoinSymbol; ?></h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i>
                                <?php $thisCoinPrice = $coinData[$xx]['price_usd'];?>
                                 <span class="counter text-success"> <?php echo number_format($thisCoinPrice,2); ?> </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">1HOUR CHANGES</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $coinData[$xx]['percent_change_1h']; ?></span>
                                <?php echo"%"; ?>
                                </li>
                             </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">24 HOUR CHANGES</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $coinData[$xx]['percent_change_24h'];?></span>
                                <?php echo"%"; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
              <div id="tradingview_29b39"></div>
              <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
              <script type="text/javascript">
              new TradingView.widget(
              {
              //"autosize": true,
              "width":1600,
              "height":720,
              "symbol": "<?php echo $thisCoinSymbol; ?>" + "USD",
              "interval": "1",
              "timezone": "Europe/Berlin",
              "theme": "Dark",
              "style": "2",
              "locale": "en",
              "toolbar_bg": "#f1f3f6",
              "enable_publishing": false,
              "allow_symbol_change": true,
              "container_id": "tradingview_29b39"
            }
              );
              </script>
            </div>
            <!-- TradingView Widget END -->
<?php
 }


 ?>