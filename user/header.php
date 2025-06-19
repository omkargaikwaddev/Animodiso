<!DOCTYPE html>
<html lang="en">
<link href="bootstrap.css" rel="stylesheet" type="text/css">

<link href="header.css" rel="stylesheet" type="text/css">

</script>

<style type="text/css">
.auto-style1 {
	border-width: 0px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
 
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header class="container-fluid text-white">
        <div>
            <nav>
             <ul class="sidebar">
                <li onclick="HideSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">features</a></li>
                <li><a href="#">contact us</a></li>
                <li><a href="#">shop</a></li>
                <li><a href="#">Animals</a></li>
             </ul>
             <ul>
                <li><a href="index.php"><img src="images/logoo.PNG" style="float:left" height="10px" width="150"class="head-img img-fluid auto-style1 logoo"></a></li>
                        <li><a href="cards.php">Animals</a></li>
               <li><a href="doctor.php">Doctor</a></li>
                <li><a href="contact-us.php">contact us</a></li>
                <div class="select">
               <select  id="destinationSelect1" onchange="redirectToPage1()">
	<option value="">Products</option>
    <option value="productdisplay.php?productcategories=Shop for Dogs">Shop for Dogs</option>
    <option value="productdisplay.php?productcategories=Shop for  Cats">Shop for  Cats</option>
    <option value="productdisplay.php?productcategories=Shop for Horses">Shop for Horses</option>
    <option value="productdisplay.php?productcategories=Shop for Cows">Shop for Cows</option>
    
  </select>
  </div>
                
   
    <li><a href="signup.php">SignUp</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="viewcart.php">cart</a></li>

                <li onclick="showSidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
             </ul>
            </nav>
            </div>
            </header>
                       
            
                
                   
           <script>
            function showSidebar()
            {
                const sidebar = document.querySelector('.sidebar')
                sidebar.style.display = 'flex'
            }
            function HideSidebar()
            {
                const sidebar = document.querySelector('.sidebar')
                sidebar.style.display = 'none'
            }
	
  	  function redirectToPage() {
	      var selectElement = document.getElementById("destinationSelect");
	      var selectedValue = selectElement.options[selectElement.selectedIndex].value;
 	     if (selectedValue) {
	        window.location.href = selectedValue;
	      }
	    }

	 function redirectToPage1() {
	      var selectElement = document.getElementById("destinationSelect1");
	      var selectedValue = selectElement.options[selectElement.selectedIndex].value;
 	     if (selectedValue) {
	        window.location.href = selectedValue;
	      }
	    }
           </script>
          
  