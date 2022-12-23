
<!DOCTYPE html>
<html lang="en">
<title>Tamilar Park</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
   <style>
div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>


		<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.top-container {
  background-color: #f1f1f1;
  padding: 4px;
  text-align: center;
}

.header {
  padding: 10px 16px;
  background: #555;
  color: #f1f1f1;
}
.content {
  padding: 16px;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
.sticky + .content {
  padding-top: 102px;
}
</style>
<body>

<div class="top-container">
<img src="home/admin/photo/logo/2.png" alt="Image" class="w3-left w3-margin-right" style="width:100px; border-radius: 8px;">
<h1>TamilarPark</h1>
  Chunkankadai, Nagercoil,</br>63854 95222</div>
  
<div class="" id="myHeader">

<div class="w3-bar w3-black w3-card" style="max-width: 400px">
<div class="scrollmenu" style="max-width: 400px">
<a class="changeable" href="#1">Starters</a>
<a class="changeable" href="#2">Beverages</a>
<a class="changeable" href="#3">Soup</a>
<a class="changeable" href="#5">Noodles</a>
<a class="changeable" href="#7">Veg main course</a>
<a class="changeable" href="#8">Non veg main course</a>
<a class="changeable" href="#9">Rice</a>
<a class="changeable" href="#16">Salads</a>
</div>
</div>
</div>
 <div class="w3-content" >
<div style="margin-bottom: 5px" class="btn btn-success btn-block font-weight-bold">Starters</div>
<div class="w3-black" >
    <div class="w3-container w3-content w3-padding-64" style="max-width:400px">    
      <div class="w3-padding-20 w3-ul quantity_span " style="margin-bottom: 5px">
        <img src="home/admin/photo/3.jpg" alt="Image" class="w3-left w3-margin-right" style="width:100px; border-radius: 8px;" data-toggle="modal" data-target="#myModal3">
        <span class="w3-large">TamilarPark</span><span class="w3-large pull-right">&#2352; 100</span>
        <div>This popular kebab is made of minced meat</div><div class="add_button_span" >
          <button  class="pull-right btn btn-sm btn-danger font-weight-bold add_qty" >ADD <i class="fa fa-plus"></i></button>
          </div>
          <span class="plus_minus_span qty pull-right" style="display: none">
            <input type="hidden" class="id" value="3" />
            <input type="hidden" class="center_id" value="2" />
            <input type="hidden" class="project_name" value="Kebab" />
            <input type="hidden" class="pricing" value="100" />
                      <span class="minus bg-danger">-</span>
                      <input style="color:black" readonly="readonly" type="text" maxlength="2" size="2" class="qty_text" name="qty_text" value="0">
                      <span class="plus bg-success">+</span>
                  </span>
				   <hr>
      </div>
    </div>  
  </div>



</div>



<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>






<body style="max-width: 400px;background-color: black">
<nav>
<div class="w3-top" style="max-width: 400px">


</div>
</nav>
<!-- Page content -->


<script src="js/jquery-2.1.4.min.js"></script>  
<script src="js/bootstrap.min.js"></script>  



 
 
</body>
</html>
