<?php
include_once"allitnalp.php";
include_once"conex.php";
class register extends allitnalp
{
function __construct()
{  
    $this->showNav("Create your account");
    $this->showRegis();
    $this->showFooter();

}//end construct

function showRegis()
{
?>
<div class=" col-sm-5 text-center">
<div class="panel panel-primary">
<div class="panel-heading">
  Register form
</div>

<div class="panel-body">

<form class="form-horizontal" role="form" method="post" action="register.php" enctype="multipart/form-data">

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" style="width:250px;" name="email" id="email" placeholder="Enter email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" style="width:250px;" name="pwd" id="pwd" placeholder="Enter password">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd2">Re-enter:</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" style="width:250px;" name="pwd2" id="pwd2" placeholder="Re-enter password">
      </div>
    </div>
    
<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">User:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" style="width:250px;" name="usr" id="usr" placeholder="Enter user name">
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Avatar</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" style="width:250px;" name="pic" id="pic" placeholder="Choose profile pic">
      </div>
     </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="submit">
      </div>
    </div>
  </form>

  </div>
  </div>
  </div>
   
<?php

if($_POST) 
{
   
    $id=0;//user ID AUTO INCREMENT
    $name = $_POST["usr"];//user name
    $email = $_POST["email"];//user email
    $password ="password";
    if($_POST['pwd']===$_POST['pwd2'])
    {
       $password = $_POST["pwd"];//user password 
    }
    else
    {
      echo "
<div class=\"col-sm-4 alert alert-danger\" style='float:right;'>
  <strong>Passwords don't mach.</strong>
</div>";
      exit;
    }
    $level = 1;//user level
    $date1 = date("d-m-Y");//date of registry
    $pic = $this->Copiar_foto($name);//user profile picture
    $img_count = 0;//user images count
    
    
    $C = $this->getCon();
    //echo "$id ,$name ,$email ,$password ,$level ,$date1 ,$pic ,$img_count<br>";
    $qry = "INSERT INTO user VALUES (?,?,?,?,?,?,?,?)";
    $STM = $C->prepare($qry);
    $STM->bind_param("issssssi",
      $id,
      $name,
      $email,
      $password,
      $level,
      $date1,
      $pic,
      $img_count);
    $STM->execute();
    if($STM->affected_rows > 0)
    {
         $STM->close();
         echo "<div class=\"col-sm-5 alert alert-success text-center\" style='float:left;'>
               <strong>Register complete</strong><br>
               Now just confirm your account via Email.
               </div>";
    }//end if
    else
    {
         echo "<div class=\"alert alert-danger text-center\" style='float:left;'>
               <strong>An error ocurred</strong> <br>".$STM->error."
               </div>";
         unlink($pic);
    }//end else


}//end if POST
}//end showRegis

 function Copiar_foto($usrName)
  {

    $nombre = $_FILES["pic"]["name"];
    $nom_tmp = $_FILES["pic"]["tmp_name"];
    $destino = "imagenes/profiles/".$usrName."-avatar.".pathinfo(basename($nombre),PATHINFO_EXTENSION);

    $imageFileType = pathinfo(basename($nombre),PATHINFO_EXTENSION);
    
    
        if (file_exists($destino)) 
        {
            echo "<div class=\"col-sm-4 alert alert-danger\" style='float:left;'>
                 <strong>Picture already exist.</strong>
                 </div>";
            exit;
        }//end if
    
        if($imageFileType != "jpg" && $imageFileType != "JPG"
         && $imageFileType != "png" && $imageFileType != "PNG"
         && $imageFileType != "jpeg" && $imageFileType != "JPEG" 
         && $imageFileType != "gif" && $imageFileType != "GIF")
        {
            echo "
                <div class=\"col-sm-4 alert alert-danger\" style='float:left;'>
                 <strong>Format not allowed.</strong>
                 </div>";
            exit;
        }//end if
        else  
        {
        
            if(!copy($nom_tmp, $destino))
            {
                echo "
                <div class=\"col-sm-4 alert alert-danger\" style='float:left;'>
                 <strong>Error.</strong>
                 </div>";
              
                
            }//end if
            else
            {
              return $destino;
            }
            
        }//end if
        
        
}//end Copiar_foto


}//end class
new register();
