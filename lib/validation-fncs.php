<?php
function airportSelected($value){
  if ($_POST['origin_id']=="error"){
    return false;
  }
  return true;
}

 ?>
