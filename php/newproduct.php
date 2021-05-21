<?php
    include_once("dbconnect.php");
    if(isset($_POST['submit'])){
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        $folder = '/home10/sopmycom/public_html/myshop/images/';
        //$uploadfile=$_FILES['image']['name'];
        $prname = $_POST['prname'];
        $prtype = $_POST['prtype'];
        $prprice = $_POST['prprice'];
        $prqty = $_POST['prqty'];

        move_uploaded_file($filetmpname,$folder.$filename);
           $sqlinsert = "INSERT INTO tbl_products(image,prname,prtype,prprice,prqty) VALUES('$filename','$prname','$prtype','$prprice','$prqty')";
           try{
               $conn->exec($sqlinsert);
               echo "<script> alert('Add Success.')</script>";
               echo "<script> window.location.replace('../php/index.php')</script>";
           }catch(PDOException $e){
               echo "<script> alert('Add failed')</script>";
               echo "<script> window.location.replace('../php/newproduct.php')</script>";
           }
        }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>New Product Registration</title>
      <link rel="shortcut icon" type="image" href="/myshop/images/logo.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/myshop/css/style.css">
      <script src="/myshop/js/validate.js"></script>
      
   </head>
   <body>
   <div class="header">
   <img src="/myshop/images/logo.png" alt="Logo" >
        <h1>Ninjaz</h1>
        <p>New Product Registration</p>
    </div>
    <br>
    <br>
    <div class="container">
            <form name="addNew" action="/myshop/php/newproduct.php" onsubmit="return  validateAddNew() " method="post" enctype="multipart/form-data" >
            <div class="row">
                  <div class="col-25">
                       <i class="   fa fa-user"></i>
                   <label for="pimage">Insert Your Product Image </label>
                    </div>
                    <div class="col-75">
                    <input type="file" name="uploadfile" id="idimage" >
                    </div>
                </div>

              
                <div class="row">
                    <div class="col-25">
                        <i class="	fa fa-mobile-phone"></i>
                        <label for="prname">Product Name </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="idpname" name="prname" placeholder="Your Product name..">
                    </div>
                </div>
                <div class="row">
					<div class="col-25">
						<i class="fa fa-search"></i>
						<label for="prtype">Product Type</label>
					</div>
					<div class="col-75">
						<select name="prtype" id="idptype">
							<option value="noselection">Please Select Your Product Type</option>
							<option value="Phone Case">Phone Case</option>
							<option value="Earphone">Earphone</option>
                            <option value="Charger">Charger</option>
                            <option value="Powerbank">Powerbank</option>
						</select>
					</div>
				</div>
                <div class="row">
                    <div class="col-25">
                        
                        <i class="fa fa-money"></i>
                        <label for="prprice">Product Price (RM) </label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="idprice" name="prprice" placeholder="Your Product price.." min="1" max="100">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <i class="fa fa-sort-numeric-asc"></i>
                        <label for="prqty">Product Quantity</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="idquantity" name="prqty" placeholder="Your Product Quantity.."min="1" max="100">
                    </div>
                </div>
                <br>
                <br>
       
                <div class="row">
                    <div><input type="submit" name="submit" value="Add New Product"></div>
                </div>

            </form>

        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="footer">
        <p>Ninjaz Malaysia Sdn. Bhd. (1259993-K) Copyright <span>&#169;</span> 2021 All Rights Reserved. Website
            developed by Man Nee</p>
    </div>
    </body>
</html>