<?php session_start();?>
<!DOCTYPE html>
  <html lang="en" id="ng-app" ng-app="app">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	

    <!--javascrips-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	  <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
   
	<!--stylesheets-->
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  

	<!--fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">


<!-- Fix for old browsers -->
        <script src="http://nervgh.github.io/js/es5-shim.min.js"></script>
        <script src="http://nervgh.github.io/js/es5-sham.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="angular/console-sham.js"></script>

        <!--<script src="../bower_components/angular/angular.js"></script>-->
        <script src="http://code.angularjs.org/1.1.5/angular.min.js"></script>
        <script src="angular/dist/angular-file-upload.min.js"></script>
        <script src="angular/controllers.js"></script>

        <!--thumbnails for images-->
        <script src="angular/directives.js"></script>

    <script>
    function showS()
    {
       if(document.getElementById("sf").style.visibility==="hidden")
  	 {
  	   document.getElementById('sf').style.visibility='visible';
  	 }
  	 else
  	 {
  	   document.getElementById('sf').style.visibility='hidden';
  	 }
    }
	
document.getElementById("files").onchange = function () {

alert(document.getElementById("files").value);


};
    </script>
    
	  <style>
      .my-drop-zone { border: dotted 3px lightgray; }
            .nv-file-over { border: dotted 3px red; } /* Default class applied to drop zones on over */
            .another-file-over-class { border: dotted 3px green; }

            html, body { height: 100%; }

            canvas {
                background-color: #f3f3f3;
                -webkit-box-shadow: 3px 3px 3px 0 #e3e3e3;
                -moz-box-shadow: 3px 3px 3px 0 #e3e3e3;
                box-shadow: 3px 3px 3px 0 #e3e3e3;
                border: 1px solid #c3c3c3;
                height: 100px;
                margin: 6px 0 0 6px;
            }

    
  .modal-header, h4, .close {
      background-color: #0d0d0d;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .w3-lobster {
  font-family: "Lobster", serif;
}
.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
  </style>
	


<?php
include_once'conex.php';
class allitnalp extends conex
{


	function showNav($title = "IMG4U")
	{
    echo "<title>$title</title>";
    ?>

	</head>

<nav class="navbar navbar-inverse " style="padding-top:0px;">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand w3-xxxlarge w3-allerta" href="index.php" > IMG4U
	  </a>
    </div>
    <ul class="nav navbar-nav">
      <li>
	  <div class="w3-xlarge w3-lobster text-danger" style="margin:8px;">Where your pictures belong</div></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" >
	
	<li>
	  <div class="col-xs-16" style="margin:8px;visibility:hidden;" id="sf">
        <input class="form-control"  placeholder="Search term" type="text">
      </div>
	</li>
      
	  <li>
	  <a href="#" onClick="showS();">
	  <span class="glyphicon glyphicon-search text-danger"></span> 
	  <span class="">Search</span></a>
	  </li>
	  
	  <li>
	  <a href="upload.php">
	  <span class="glyphicon glyphicon-upload text-danger"></span>
	  <span class="">Upload</span></a>
	  </li>
	  
      <li>
	  <a href="#" data-toggle="modal" data-target="#myModal">
	  <span class="glyphicon glyphicon-log-in text-danger"></span> 
	   <span class="">Login</span></a>
	  </li>
    
	</ul>
  </div>
</nav>
    <?php
	}//end showNav


   
  
    public function showFooter()
    {
    ?>


  <nav class="navbar navbar-inverse navbar-fixed-bottom text-center" style="padding-top:13px;">

  <a href="#" class="text-left text-danger">Home</a>-
  <a href="#" class=" text-danger">Register</a>-
  <a href="#" class=" text-danger">About</a>-
  <a href="#" class=" text-danger">DCMA</a>

  </nav>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 40px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="w3-allerta">Enter your account</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="log.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
		  <div style="font-size:22px;color:#000000;font-style:bold;padding:10px 10px;margin:0px;" align="center">
		  -OR-<br>
		
		  
		  </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="register.php">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 

  
   <!-- modal -->
   
  	<script>
	$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
	
  function showLogin() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
      } else {
          x.className = x.className.replace(" w3-show", "");
      }
  }

    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
  });
     
  	</script>
	
	

	
	
  </body>
  </html>

    <?php	
    }//end showFooter

    function showPics($search="")
    {
      
      $C = $this->getCon();
	  
      $qry="";
      if($search==="")
      {
        $qry = "SELECT id_Image,location FROM image ORDER BY id_Image ASC;";      
      }
      else
      {
        $qry = sprintf("SELECT id_Image,location FROM image WHERE title_Image LIKE '%s' ORDER BY id_Image ASC;",$search);

      }
      //cambiar query
      $res = $C->query("SELECT * FROM image");

    if($res->num_rows > 0)
    {

      $C->close();         
    }//end if
    else
    {
         echo "<div class=\"alert alert-danger text-center\">
               <strong>There's no pictures.</strong> <br>
               </div>";
    }//end else

    }//end showPics

}//end class