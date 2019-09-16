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
</head>
<body bgcolor="#999999">
    
    <form action="psot" action="insert_product.php" enctype="multipart/form-data">
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
                <td colspan="2" align="center"><input type="submit" name="submit"></td>
            </tr>
        </table>
    
    </form>

</body>
</html>