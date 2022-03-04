    <!--Start of Navigation Bar-->
    <div class="nav-bar">
        <div class="logo">
            <a href="index.php"><img src="images/icon.png" alt="icon.png" style="width: 100px;"></a>
        </div>

        <?php
            @include 'config.php'; 
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
        ?>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About</a></li>
                <li><?php 
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                }else{
                    echo "<a href='login.php'>Login</a>";
                }
                ?></li>

                <li><a href="cart.php" class="fas fa-shopping-cart"> <span><?php echo $row_count; ?></span></a></li>
                <?php 
                if(isset($_SESSION['account-manipulate']))
                {
                    echo $_SESSION['account-manipulate'];
                }else{
                }
                ?>
            </ul>
        </nav>
    </div>
    <!--End of Navigation Bar-->