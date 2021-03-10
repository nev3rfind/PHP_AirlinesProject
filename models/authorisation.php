<?php
function checkifAdmin (){
if($_SESSION["role"] == 2){
  echo '<li><a href="index.php?action=create">Add a new flight</a></li>';
}
}

?>
