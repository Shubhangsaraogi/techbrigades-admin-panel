<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- jQuery -->

  
   

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    

   
  

<style>
b{
  position: relative;
  animation-name: example;
  animation-duration: 4s;
  animation-direction: reverse;  
}
.btn1{
  position: relative;
  animation-name: example;
  animation-duration: 4s;
  animation-direction: reverse;  
}
@keyframes example {
  0%   {background-color:rgb(158,158,158); left:0px; top:0px;}
  25%  {background-color:rgb(223,209,209); left:25px; top:0px;}
  50%  {background-color:rgb(158,158,158); left:25px; top:40px;}
  75%  {background-color:rgb(223,209,209); left:0px; top:40px;}
  100% {background-color:rgb(158,158,158); left:0px; top:0px;}
}
.modal{
  background-image: linear-gradient(to right, rgb(5,35,65,0.6) , rgb(0,0,0,0.6)
); 
}

    .navbar .dropdown-menu div[class*="col"] {
    margin-bottom: 1rem
}

.navbar .dropdown-menu {
    border: none;
    background-color: #333333 !important;
    margin-top: 8px
}

.navbar {
    padding-top: 0px;
    padding-bottom: 0px
}

.navbar .nav-item {
    padding: .5rem .5rem;
    margin: 0 .25rem
}

.navbar .dropdown {
    position: static
}

.navbar .dropdown-menu {
    width: 100%;
    left: 0;
    right: 0;
    top: 45px
}

.navbar .dropdown:hover .dropdown-menu,
.navbar .dropdown .dropdown-menu:hover {
    display: block !important
}

.navbar .dropdown-menu {
    border: 1px solid #333333;
    background-color: #333333;
}

a.i {
    margin-top: -20px;
    font-weight: 400;
    color: #333333;
}

a.catogary {
    margin-left: -20px;
    color: white
}

button.srch {
    padding: 0px
}

@media only screen and (max-width: 1024px) and (min-width: 768px) {
    input.srch {
        padding: 0px;
        width: 100%
    }
}

a.nav-link.active {
    font-weight: 700;
    background-color:#868583 ;
    color: white
}

a.navbar-brand {
    color: white
}

span.navbar-toggler.icon {
    color: black
}
.button12 {
        background-color: #1c87c9;
        /*-webkit-border-radius: 60px;*/
        /*border-radius: 60px;*/
        border: none;
        color: #eeeeee;
        cursor: pointer;
        display: inline-block;
        font-family: sans-serif;
        font-size: 20px;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
      }
      @keyframes glowing {
        0% {
          background-color:  #2ba805; ;
          box-shadow: 0 0 5px #2ba805;
        }
        50% {
          background-color: #49e819;
          box-shadow: 0 0 20px #49e819;
        }
        100% {
          background-color: #2ba805;
          box-shadow: 0 0 5px #2ba805;
        }
      }
      .button12 {
        animation: glowing 1300ms infinite;
      }


</style>

<script>
    $(document).ready(function() {

$(window).resize(function(){
if ($(window).width() >= 980){

$(".navbar .dropdown-toggle").hover(function () {
$(this).parent().toggleClass("show");
$(this).parent().find(".dropdown-menu").toggleClass("show");
});

$( ".navbar .dropdown-menu" ).mouseleave(function() {
$(this).removeClass("show");
});

}
});



});
</script>
<style>
    
</style>
</head>
<body >
    <nav class="navbar  navbar-expand-sm navbar-dark bg-dark"> 
    <a class="navbar-brand" href="index.php"><img src="ansronewebsite/1_1-removebg-preview 1.png" alt="Logo" style="width:220px;height:55px"></a>
<!--a class="navbar-brand" href="index.php"><img src="images/LOGO.png" alt="Logo" style="width:100px;height:50px"></a>
<a class="navbar-brand" href="index.php"><img src="images/TEXT.png" alt="Logo" style="width:100px;height:50px"></a-->
    <!--Toggle Collapse Button--> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <!--Division for navbar-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--UL for links-->
        <ul class="navbar-nav ml-auto nav-fill">
            
            
            <li class="nav-item">
      <a class="nav-link" href="whyus.php">WhyTechBrigades</a>
    </li>
            <!-- Catagory 1-->
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle catogary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Services </a>
                <!--Div for catogary 1-->
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <div class="container">
                        <div class="row" > 
                            <!--Row 1-->
                          
                                
                               
                             <div class="col-md-2 p-2">
                                
                                <!--Column 1-->
                                <ul class="nav flex-column " >
                                    <li class="nav-item  align-items-center"> <a class="nav-link i" href="outsourcing.php">> Outsourcing</a> </li>
                                   
                                    
                                     
                                </ul>
                               
                            </div>
                            <div class="col-md-2 p-2">
                                
                                <!--Column 1-->
                                <ul class="nav flex-column " >
                                    
                                      <li class="nav-item  align-items-center"> <a class="nav-link i" href="digital.php">> Digital Marketing</a> </li>
                                      
                                     
                                </ul>
                               
                            </div>
                             
                           
                            <div class="col-md-2 p-2">
                                
                                <!--Column 1-->
                                <ul class="nav flex-column " >
                                
                                     <li class="nav-item align-items-center"> <a class="nav-link i" href="consultancyServices.php">> Consultancy Services</a> </li>
                                      
                                       
                                </ul>
                               
                            </div>
                            <div class="col-md-2 p-2">
                                
                                <!--Column 1-->
                                <ul class="nav flex-column " >
                                
                                     
                                      <li class="nav-item  align-items-center"> <a class="nav-link i" href="customsoftware.php">> Custom Software Development</a> </li>
                                       
                                </ul>
                               
                            </div>
                           
                            
                          
                             <div class="col-md-2 p-2">
                                
                                <!--Column 1-->
                                <ul class="nav flex-column " >
                                    
                                    <li class="nav-item  align-items-center"> <a class="nav-link i" href="ittraining.php">>  IT Training & Tutorials</a> </li>
                                    
                                     
                                </ul>
                               
                            </div>
                           
                             
                            
                            
                             <div class="col-md-2 p-2">
                                
                                <!--Column 1-->
                                <ul class="nav flex-column " >
                                    
                                    <li class="nav-item  align-items-center"> <a class="nav-link i" href="itInfrastructureManagementServices.php">>  IT Infrastructure Management</a> </li>
                                    
                                     
                                </ul>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </li> <!-- Catagory 2-->
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle catogary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Industry </a>
                <!--Div for catogary 2-->
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="container ">
                        <div class="row ">
                            <!--Row 1-->
                            <div class="col-md-2">
                                <!--Column 1-->
                                <ul class="nav flex-column p-2 ">
                                    <li class="nav-item "> <a class="nav-link i" href="healthcare.php">> HealthCare</a> </li>
                                    <li class="nav-item r"> <a class="nav-link i" href="wellandfit.php">> Wellness & Fitness</a> </li>
                                     <li class="nav-item "> <a class="nav-link i" href="transport.php">
                                         >Transportation</a> </li>
                                 </ul>
                            </div>
                            
                            
                            
                            <div class="col-md-2">
                                <!--Column 2-->
                                <ul class="nav flex-column p-2 ">
                                     <li class="nav-item"> <a class="nav-link i" href="diamond.php">> Diamond & Jewellery</a> </li>
                                      <li class="nav-item"> <a class="nav-link i" href="platformAndSoftwareProducer.php">> Platform & Software Producer</a> </li>
                                   
                                   
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <!--Column 3-->
                                <ul class="nav flex-column p-2 ">
                                     <li class="nav-item"> <a class="nav-link i" href="elearning.php">> Education</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="startup.php">> Start-Up</a> </li>
                                     <li class="nav-item"> <a class="nav-link i" href="publicSector.php">> Public Sector</a> </li>
                                   
                                </ul>
                            </div>
                             <div class="col-md-2">
                                <!--Column 1-->
                                <ul class="nav flex-column p-2 ">
                                    <li class="nav-item"> <a class="nav-link i" href="moverpacker.php">> Packers & Movers</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="retail.php">> Retail</a> </li>
                                     <li class="nav-item"> <a class="nav-link i" href="utilities.php">> Utilities</a> </li>
                                 </ul>
                            </div>
                            <div class="col-md-2">
                                <!--Column 1-->
                                <ul class="nav flex-column p-2">
                                    <li class="nav-item"> <a class="nav-link i" href="shopping.php">> E-Commerce & Shopping</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="consumerElectronics.php">> Consumer Electronics</a> </li>
                                    
                                 </ul>
                            </div>
                             <div class="col-md-2">
                                <!--Column 1-->
                                <ul class="nav flex-column p-2 ">
                                    <li class="nav-item"> <a class="nav-link i" href="finance.php">> Banking, Finance & Insurance</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="professionalServices.php">> Professional Services</a> </li>
                                 </ul>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </li> <!-- Catagory 3-->
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle catogary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tech Skills </a>
                <!--Div for catogary 3-->
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="container ">
                        <div class="row skills">
                            <div class="col-md-3">
                                <!--Column 1-->
                                <ul class="nav flex-column">
                                     <li class="nav-item"> <a class="nav-link active" href="#">Server Side</a> </li>
                                      <li class="nav-item"> <a class="nav-link i" href="phpSkills.php">PHP</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="yii.php">YII</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="symfony.php">Symfony</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="zend.php">Zend</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="cakephp.php">CakePhp</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="python.php">Python</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="django.php">Django</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="nodejs.php">Node.js</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="ruby.php">Ruby</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="flask.php">Flask</a> </li>
                                 </ul>
                            </div>
                            <!--Row 1-->
                            <div class="col-md-3">
                                <!--Column 1-->
                                <ul class="nav flex-column">
                                    <li class="nav-item"> <a class="nav-link active" href="#">Front End</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="jquery.php">Jquery</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="angularjs.php">AngularJS</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="reactjs.php">ReactJS</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="vuejs.php">VueJS</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="meanstack.php">Mean Stack</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="mernstack.php">Mern Stack</a> </li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <!--Column 2-->
                                <ul class="nav flex-column">
                                    <li class="nav-item"> <a class="nav-link active" href="#">E-Commerce</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="magneto.php">Magento</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="woocommerce.php">Woo-Commerce</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="shopify.php">Shopify</a> </li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <!--Column 3-->
                                <ul class="nav flex-column">
                                    <li class="nav-item"> <a class="nav-link active" href="#">Mobile</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="ios.php">IOS</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="android.php">Android</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="reactnative.php">React Native</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="hybrid.php">Hybrid</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="flutter.php">Flutter</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="ionic.php">Ionic</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="swift.php">Swift</a> </li>
                                    
                                </ul>
                            </div>
                            <div class="col-md-1">
                                <!--Column 4-->
                                <ul class="nav flex-column">
                                    <li class="nav-item"> <a class="nav-link active" href="">CMS</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="wordpress.php">Wordpress</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="drupal.php">Drupal</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="joomla.php">Joomla</a> </li>
                                    <li class="nav-item"> <a class="nav-link i" href="statamic.php">Statamic</a> </li>
                                    
                                </ul>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </li> <!-- Catagory 4-->
           <li class="nav-item dropdown"> <a class="nav-link catogary" href="trendytech.php" id="navbarDropdown" aria-haspopup="true" aria-expanded="false"> Trendy Techs</a>
    </li>
   <li class="nav-item dropdown"> <a class="nav-link catogary" href="portfolio.php" id="navbarDropdown" aria-haspopup="true" aria-expanded="false">Brigades Gallery</a>
    </li>
    <li class="nav-item dropdown"> <a class="nav-link catogary" href="career.php" id="navbarDropdown" aria-haspopup="true" aria-expanded="false">Career</a>
    </li>
    <li class="nav-item dropdown"> <a class="nav-link catogary" href="contact.php" id="navbarDropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
    </li>
        </ul>
        
  
<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style=" background-image: linear-gradient(to right, rgb(158,158,158), rgb(52,58,64,0.8)

);color:white; ">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Get Free Consultation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
            
            <div class="lg:w-full flex flex-col sm:flex-row sm:items-center items-start mx-auto">
       
      <p class="flex-grow    text-gray-900" ><b>Start Ups</b></p>
     <a href="whyus.php#sect"> <button class="btn1 flex-shrink-0 text-white bg-dark border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">Click Here</button> </a><br>
      
    </div>
    <br>
    <div class="lg:w-full flex flex-col sm:flex-row sm:items-center items-start mx-auto">
       
      <p class="flex-grow    text-gray-900" ><b>Small Business</b></p>
     <a href="whyus.php#sect"> <button class="btn1 flex-shrink-0 text-white bg-dark border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">Click Here</button></a><br>
      
    </div>
       
    <br>
    <div class="lg:w-full flex flex-col sm:flex-row sm:items-center items-start mx-auto">
       
      <p class="flex-grow    text-gray-900" ><b>Enterprise Solutions</b></p>
     <a href="whyus.php#sect"> <button class=" btn1 flex-shrink-0 text-white bg-dark border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">Click Here</button></a><br>
      
    </div>
       
     <br>
     <br>
          <!--input type="text" id="form3" placeholder="Your name" class="form-control validate">
          <!--label data-error="wrong" data-success="right" for="form3">Your name</label-->
        </div>

        <div class="md-form mb-4">
         
          <!--input type="email" id="form2" placeholder="Your Email"  class="form-control validate">
          <!--label data-error="wrong" data-success="right" for="form2">Your email</label-->
        </div>
        <div class="md-form mb-4">
         
          <!--input type="text" id="form3" placeholder="Address"  class="form-control validate"-->
          <!--label data-error="wrong" data-success="right" for="form2">Your email</label-->
        </div>
        <div class="md-form mb-4">
         
          <!--input type="varchar" id="form4" placeholder="Contact No."  class="form-control validate"-->
          <!--label data-error="wrong" data-success="right" for="form2">Your email</label-->
        </div>

      </div>
      
    </div>
  </div>
</div>

<!--div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalSubscriptionForm">Launch
    Modal Subscription Form</a>
</div!-->



        <form class="form-inline my-2 my-lg-0">
     
    <a href="" class="btn btn-outline-light my-2 my-sm-0 " data-toggle="modal" data-target="#modalSubscriptionForm" >FREE CONSULTATION  </a>
   </form>
  
        
        <!--Search-->
        
    </div>
</nav>
</body>
</html>