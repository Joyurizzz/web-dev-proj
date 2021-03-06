<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Orders</title>
    
</head>
<body>
<?php include("partials/navigation.php") ?>
<br>
    <h1 class="heading">Orders</h1>
    <br>
        <table class="tbl-full">
            <thead>
                <th>Order ID</th>
                <th>Total</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Zipcode</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * FROM orders
                INNER JOIN user
                ON orders.user_id = user.user_id
                WHERE user.user_id = $_SESSION[user_id]
                ORDER BY orders.order_date DESC;";
                
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_assoc($result)){

            ?>
            <tr>
                <th scope="row"><?php echo $rows['order_id'];?></th>
                <td><?php echo $rows['total_price'];?></td>
                <td><?php echo $rows['first_name'];?></td>
                <td><?php echo $rows['last_name'];?></td>
                <td><?php echo $rows['delivery_address'];?></td>
                <td><?php echo $rows['zipcode'];?></td>
                <td><?php echo $rows['order_status'];?></td>
                <td><?php echo $rows['order_date'];?></td>
                <td><a class="option-btn" href="user-order-details.php?order_id=<?php echo $rows['order_id'];?>&order_status=<?php echo $rows['order_status']?>">Details</a><br>
                <?php 
                if ($rows['order_status'] != 'cancelled' && $rows['order_status'] != 'delivered'){
                    ?>
                    <a class="delete-btn" href="user-cancelled-order.php?order_id=<?php echo $rows['order_id'];?>&order_status=cancelled">Cancel</a>
                    <?php
                }
                
                ?>
            
            </td>
            </tr>




        <?php }
    }
    ?>
                </tbody>
        </table>
        <br><br><br><br><br><br><br><br>

<?php include("partials/footer.php") ?>

</body>
</html>