<!DOCTYPE html>
<html>
   <head>
      <title>Welcome to Ninjaz</title>
      <link rel="shortcut icon" type="image" href="/myshop/images/logo.png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/myshop/css/style.css">
   </head>
   <body>
   <div class="header">
   <img src="/myshop/images/logo.png" alt="Logo" >
        <h1>Ninjaz</h1>
        <p>King of Mobile Phone Accessories</p>
    </div>
     <br>
     <br>
              
     <div class="row"> 
			<?php
				$conn = mysqli_connect("localhost","sopmycom_adminmyshop","i58[uBtsBU#k") or die("Unable to connect");
				mysqli_select_db($conn,"sopmycom_myshop");
				
				$sql ="SELECT * FROM tbl_products";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
					?>
               <div class="column-card" >
					<div class="card">
               <div class="left">
                    <!-- <div style="float:left;width:25%;text-align:center;padding:10px 50px 18px 50px"> -->
					<img src = "/myshop/images/<?php echo $row['image'];?>" height=50% width=50%/>
					</div>
					<div class="right">
                  <p>Product Name  &nbsp&nbsp: &nbsp&nbsp<?php echo $row['prname']; ?></p>
                  <p>Product Type &nbsp&nbsp: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
                  <p>Product Price &nbsp&nbsp: &nbsp&nbsp<?php echo $row['prprice']; ?></p>
						<p>Quantity &nbsp&nbsp: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
					</div>
               </div>
               </div>
					<?php
					}
				}
			?>


        </div>
	<br>
	<br>
    <br>
    <br>
    <br>
      <a href="/myshop/php/newproduct.php" class="float">
          <i class="fa fa-plus my-float"></i>
          <span class="tooltiptext">Add New Product</span>
        </a>
        <div class="footer">
        <p>Ninjaz Malaysia Sdn. Bhd. (1259993-K) Copyright <span>&#169;</span> 2021 All Rights Reserved. Website
            developed by Man Nee</p>
    </div>
   </body>
</html>