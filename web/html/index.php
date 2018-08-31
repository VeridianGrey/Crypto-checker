<?php include("../resources/header.php"); ?>
<body>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                  <form action="index.php" method="post">
                     <div class="input-group">
                        <input name="search" type="text" class="form-control" placeholder="Search for a coin">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
             <form action="index.php" method="post">
                <div class="form-group">
                    <label for="coin_options">Select Coin</label>
                 <select name="coin_option" id="" class="form-control">
                    <option value="">Select Coin</option>
                <?php include'select_coin.php'; ?>
                    </select>
                    <br>
                     </div>
                     <input name="submit2" type="submit" value="Submit Selected">
                    </form>

               <?php include'recent_stats.php';?>
            
                <div id="reload">
               <?php include'table.php'; ?>
           </div>
            <!-- /.container-fluid -->
          <?php include("../resources/footer.php"); ?>
