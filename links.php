<?php
include_once'allitnalp.php';
class links extends allitnalp
{

    function __construct()
    {
        $this->showNav();
        $this->show();
        $this->showFooter();

    }//end __construct
    
function getPicLocation($code="")
{
  $C = $this->getCon();
  $qry = "SELECT location FROM image WHERE code = '$code';";
  $STM = $C->query($qry);
  $res = $STM->fetch_assoc();
  return $res['location'];

}//end getPicId

    function show()
    {
        if(!isset($_GET['id']) OR $_GET['id']==="")
        {
            echo "Nothing to show here!";
            exit;
        }//end if
        
        $DIRECT_LINK = $this->getPicLocation($_GET['id']);       
        $IMG_URL = $_SERVER['PHP_SELF'];
        $HTML_CODE = "<a href='$DIRECT_LINK'><img src='$DIRECT_LINK'></a>";
        $BBCODE = "[url=".$DIRECT_LINK."][img]".$DIRECT_LINK."[/img][/url]";
     ?>
<style type="text/css">
    .f3
    {
        font-size: 20px;
        color: #000000;
        font-style: bold;
        font-family: "Arial";
        font-weight: 5;
    }
    
    #img_links
    {
        position: relative;
        margin: 0 auto;

    }

    
    .reddit
    {
        border-style: solid;
        border-width:thin;
    }
    
    #img1
    {
        width:600px;
        height:500px;
    }

</style>
</head>


<div id="img_links" class="container" align="center">

<div class="row ">
    
   <div class="col-sm-7">
       <img src="<?php echo $DIRECT_LINK;?>" class="img-rounded" id="img1">

   </div>

   <div class="col-sm-5 well">
       
<h3>Share this picture</h3>

<div style="margin:0 auto;">

<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_pinterest"></a>
<a class="a2a_button_reddit"></a>
<a class="a2a_button_tumblr"></a>
<a class="a2a_button_blogger_post"></a>
<a class="a2a_button_wordpress"></a>
<a class="a2a_button_copy_link"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

</div>
<br><br>


<span class="f3">Image url</span><br>
<input value="<?php echo $IMG_URL;?>" type="text" name="img_url" class="form-control" style="width:400px;"><br>

<span class="f3">Image direct link</span><br>
<input value="<?php echo $DIRECT_LINK;?>" type="text" name="img_direct" class="form-control" style="width:400px;"><br>

<span class="f3">Image insert code</span><br>
<input value="<?php echo $HTML_CODE;?>" type="text" name="img_insert" class="form-control" style="width:400px;"><br>

<span class="f3">Image BBcode</span><br>
<input value="<?php echo $BBCODE;?>" type="text" name="img_insert" class="form-control" style="width:400px;"><br>


   </div>

</div>

</div>     

     <?php   
    }//end show 

}//end class

new links();
?>
