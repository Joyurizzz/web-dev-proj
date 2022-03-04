<?php include('partials/navbar.php');

@include 'config.php';

//inserting process
if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;
 
    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');
 
    if($insert_query){
       move_uploaded_file($p_image_tmp_name, $p_image_folder);
       $message[] = 'product add succesfully';
       header('location:manage-inventory.php');
    }else{
       $message[] = 'could not add the product';
       header('location:manage-inventory.php');
    }
 };

?>

    <div class="main-content">
    <!-- Main Content Section Starts -->
        <h1>Add Product</h1>
            

        
         <!-- Main body -->
        <br><br><br><br><br> 
           
        <div class="inventory-container">

        <section>

        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>add a new product</h3>
            <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
            <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
            <input type="submit" value="Submit" name="add_product" class="btn">
        </form>

        </section>




        </div> <!-- main body  -->


    </div><!-- div main-content -->       

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>