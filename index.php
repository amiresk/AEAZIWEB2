<!DOCTYPE html>
<html>
<title>A-EAZI Thrift Source</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>

<body class="w3-content" style="max-width:1200px">

<?php
 
 $newsletter = "newsletter";
 $block = "block";
 $db_nav = mysqli_connect("localhost", "root", "", "shop_store" );
 $nav_result = mysqli_query($db_nav ,"SELECT DISTINCT catogory FROM products");
 
echo '<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">';
echo   '<div class="w3-container w3-display-container w3-padding-16">';
echo        '<i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>';
echo        '<h3 class="w3-wide" ><b>A-EAZI <br>Thrift<br> Source</b></h3>';
echo   '</div>';

while($row = mysqli_fetch_assoc($nav_result)){

        echo   '<div class="w3-padding-8 w3-large w3-text-blue-gray" style="font-weight:bold">';
        echo       '<a  onclick= myCatogories("'.$row['catogory'].'") href=#'.$row['catogory'].' class="w3-bar-item w3-button">'.$row['catogory'].'</a>';
        echo   '</div>';
 } 
echo  '<a href="#footer" class="w3-bar-item w3-button w3-padding w3-margin-top ">Contact</a>';
echo  '<a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('.$newsletter.').style.display='.$block.'">Newsletter</a> ';
echo  '<a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>';
echo  '</nav>';
//metaphone($block); // for making wrong spelling
mysqli_close($db_nav);

?> 

<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide" >A-EAZI</div>

  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
      <p onclick="myCatogories('Food')" id="amir" class="w3-left">Jeans</p>
    <p class="w3-right">
      <a href="#jeans" class="fa fa-shopping-cart w3-margin-right"></a> 
      <a href="#jeans" class="fa fa-search"></a>
    </p>
  </header>

   <?php
        // DB name = shop_store, DB-tabel-name=products
        $db = mysqli_connect("localhost", "root", "", "shop_store" );
        $sql = "SELECT count(*) FROM products";
        $result = mysqli_query($db ,$sql);

       
      
        $row_count =  mysqli_fetch_array($result);

         echo '<div class="w3-container w3-text-grey" id="jeans">';
         echo '<p>'.intval($row_count[0]+ intval(1)).' products found ... </p>';
         echo ' </div>';

        $result = mysqli_query($db , "SELECT * FROM products" );

         /*echo "<pre>";
         print_r($result);*/
        $buynow= "Buy Now";
         $salenow = 'Sale';
         while($row = mysqli_fetch_assoc($result)){
           
               // echo '<div class ="w3-row w3-grayscale">';
                echo '<div class ="w3-col l3 s4">';
                    echo '<div class="w3-container">';
                        echo '<div class="w3-container">';
                        echo '<div class="w3-display-container">';
                        
                        echo '<img src="images/jeans1.jpg" style="width:100%">';
                        echo '<div class="w3-display-middle w3-display-hover">';
                             echo '<button class="w3-button w3-black">'.$buynow.'<i class="fa fa-shopping-cart"></i></button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                
                        echo '<p><h4><center>'.$row['name'].'</center></h4><br><b><center> $'.$row['price'].'</center></b></p>';
                    echo '</div>';    
                echo ' </div>';
              
            }

            mysqli_close($db);
  ?>
 <!--?php   include  'nameList.php'; ?-->  
 
 
</div>
<script>
    
    function myBooks(){
       //   <p class="w3-left">Jeans</p>
        var x= document.getElementsByTagName("p");
        document.getElementsByClassName("w3-left");
        document.getElementById("amir").innerHTML = "Books";
        
        
    }
    
    function myCatogories(catogory){
       //   <p class="w3-left">Jeans</p>
        var x= document.getElementsByTagName("p");
        document.getElementsByClassName("w3-left");
        document.getElementById("amir").innerHTML = catogory;
        //alert("You clicked: "+catogory);
        
        
    }
    
</script>
<script>
 
    alert('Hey, remember to tell your friends about www.A-EAZI.com!');
 
 </script>
 
<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
