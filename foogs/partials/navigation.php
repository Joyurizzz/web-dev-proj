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
                <li><a href="login.php">Login</a></li>

                <li><a href="cart.php" class="fas fa-shopping-cart"> <span><?php echo $row_count; ?></span></a></li>
                <li><a href="account.php" class="fas fa-user-circle"></a></li>
            </ul>
        </nav>
    </div>
    <!--End of Navigation Bar-->