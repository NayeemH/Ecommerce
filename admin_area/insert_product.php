<?php
    include("includes/db.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Product</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/qi6d7hz5i32y7rxgwrfnisdk6go7mxxxuftvj63dq0r4iovv/tinymce/5/tinymce.min.js"></script>
    <script type="text/javascript">
            tinymce.init({
             selector: 'textarea'

        });
    </script>
</head>
<body bgcolor="#999999">
    
    <form method="post" enctype="multipart/form-data">
        <table width="700" align="center" border="2px solid black" bgcolor="#2293B2">
            <tr align="center">
                <td colspan="2" align="center"><h2>Insert New Product</h2></td>
            </tr>

            <tr>
                <td align="right"><b>Product Tittle</b></td>
                <td><input type="text" name="product_tittle" size="75"></td>
            </tr>
            <tr>
                <td align="right"><b>Product Category</b></td>
                <td>
                    <select name="product_cat" id="">
                        <option value="">Select a Category</option>
                            <?php
                                $get_cats ="Select * from categories";
                                $run_cats = mysqli_query($con,$get_cats);

                                while($row_cats = mysqli_fetch_array($run_cats)){
                                    $cat_id =$row_cats['cat_id'];
                                    $cat_tittle = $row_cats['cat_tittle'];

                                    echo "<option value='$cat_id'>$cat_tittle</option>";
                                }
                            ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td align="right"><b>Product Brand</b></td>
                <td>
                    <select name="product_brand" id="">
                        <option value="">Select a Brand</option>
                        <?php
                            $get_brands ="Select * from brands";
                            $run_brands = mysqli_query($con,$get_brands);

                            while($row_brands = mysqli_fetch_array($run_brands)){
                                $brand_id =$row_brands['brand_id'];
                                $brand_tittle = $row_brands['brand_tittle'];

                                echo "<option value='$brand_id'>$brand_tittle</option>";
                            }
                        ?> 
                    </select>
                </td>
            </tr>

            <tr>
            <td align="right"><b>Product Image 1</b></td>
                <td><input type="file" name="product_img1"></td>
            </tr>

            <tr>
            <td align="right"><b>Product Image 2</b></td>
                <td><input type="file" name="product_img2"></td>
            </tr>

            <tr>
                <td align="right"><b>Product Image 3</b></td>
                <td><input type="file" name="product_img3"></td>
            </tr>
            
            <tr>
                <td align="right"><b>Product Price</b></td>
                <td><input type="text" name="product_price"  size="75"></td>
            </tr>

            <tr>
                <td align="right"><b>Product Description</b></td>
                <td><textarea name="product_desc" id="" cols="77" rows="10"></textarea></td>
            </tr>
            <tr>
                <td align="right"><b>Product Keyword</b></td>
                <td><input type="text" name="product_keywords"  size="75"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="insert_product" value="Insert Product"></td>
            </tr>
        </table>
    
    </form>


    <!-- php code for insertion   -->
    <?php

        if(isset($_POST['insert_product'])){
            
            //text data variables
            $product_tittle=$_POST['product_tittle'];
            $product_cat=$_POST['product_cat'];
            $product_brand=$_POST['product_brand'];
            $product_price=$_POST['product_price'];
            $product_desc=$_POST['product_desc'];
            $product_status= 'on';
            $product_keywords=$_POST['product_keywords'];

            //image variable

            $product_img1= $_FILES['product_img1']['name'];
            $product_img2= $_FILES['product_img2']['name'];
            $product_img3= $_FILES['product_img3']['name'];


            //image temp name
            $temp_name1= $_FILES['product_img1']['temp_name'];
            $temp_name2= $_FILES['product_img1']['temp_name'];
            $temp_name3= $_FILES['product_img1']['temp_name'];

            //validation for insert

            if($product_tittle=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1==''){
                echo "<script>alert('Please fill all the fields')</script>";
                exit();
            }

            else{
                //uploading image
                move_uploaded_file($temp_name1,"product_images/$product_img1");
                ove_uploaded_file($temp_name2,"product_images/$product_img2");
                ove_uploaded_file($temp_name3,"product_images/$product_img3");
                    //insert query
                $insert_product ="insert into products (cat_id,brand_id,date,product_tittle,product_img1,product_img2,product_img3,product_price,product_des,product_status,) values 
                ('$product_cat','$product_brand',NOW(),'$product_tittle','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_status')";
                
                $run_product = mysqli_query($con, $insert_product);

                if($run_product){
                    echo "<script>alert('Product inserted successfully')</script>";
                }


            }

        



        }

        else{
            echo "<script>alert('Error')</script>";
        }


    ?>

</body>
</html>

