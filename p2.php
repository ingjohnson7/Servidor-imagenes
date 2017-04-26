<?php

for($i=0; $i<count($_FILES['file']['name']); $i++)
{

echo $_FILES['file']['tmp_name'][$i];

}//end for
?>