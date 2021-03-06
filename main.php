<html ng-app="myModule">
<head>
<title> Combination of bootstrap and angularJS</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="Scripts/angular.min.js"></script>     
<!--<script src="Scripts/angular.route.min.js"></script> -->
<script src="Scripts/script.js"></script>     
<link href="css/bootstrap.min.css" rel="stylesheet" /> 

</head>
<body ng-controller="myController">
<nav class="navbar navbar-inverse navbar-fixed-top navclass" id="main-navbar" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only"> Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div> <!-- end navbar header-->

	<div class="collapse navbar-collapse" id="nav">
	<ul class= "nav navbar-nav">
	<li><a href ="#">Product Name</a></li>
	<li><a href ="#">Testimonials</a></li>
	<li><a href ="#">Features</a></li>
	<li><a href ="#emp">Employees</a></li>
	<li><a href ="#">FAQ</a></li>
	<li><a href ="#">Contact</a></li>
	</ul>  
	<div class = "btn btn-success"  style = "position:absolute;top:5;right:15;">Buy Now
	</div>
	</div>
   </div> <!-- end container-->
</nav> <!-- End of navigation -->

<div class= "container-fluid">

<div class = "carousel slide" data-ride="carousel" id = "abc">
<ol class="carousel-indicators">
<li  class="active" data-target="#abc" data-slide-to="2"></li>
<li  data-target="#abc" data-slide-to="3"></li>
<li  data-target="#abc" data-slide-to="4"></li>
<li  data-target="#abc" data-slide-to="5"></li>
<li  data-target="#abc" data-slide-to="1"></li>
</ol>

<div class = "carousel-inner">
<div class = "item  active"><img class = "center-block"src = "images/har.jpg"><div class = "carousel-caption">ALPHA</div></div>
<div class = "item"><img class = "center-block"src = "images/har1.jpg"><div class = "carousel-caption">BETA</div></div>
<div class = "item"><img class = "center-block"src = "images/har11.jpg"><div class = "carousel-caption">GAMMA</div></div>
<div class = "item"><img class = "center-block"src = "images/har4.jpg"><div class = "carousel-caption">DELTA</div></div>
<div class = "item"><img class = "center-block"src = "images/har7.jpg"><div class = "carousel-caption">PHI</div></div>
<a class="carousel-control left" data-slide="prev" href="#abc"><span class= "glyphicon glyphicon-backward"></span></a>
<a class="carousel-control right" data-slide="next" href= "#abc"><span class= "glyphicon glyphicon-forward"></span></a>
</div>
</div>

</div>
<div class ="container-fluid" id = "emp">
<h1>List of Products</h1> 
{{students}}
<ul>     
<li ng-repeat="student in students">         
<a href = "#/students/{{student.pid}}">{{student.pname}} </a> 
<img src = "images/{{student.pimage}}" style = "height :200px width:200px">
</li> 
</ul>  

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>