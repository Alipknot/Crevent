
<?php
include(__DIR__ .'/objects/class.categoria.php');
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
$Categoria = new Categoria();
$catls= $Categoria->GetList();



?>
<form action="busqueda.php" method="POST">
Buscar:<br>
<input type="text" name="busqueda" size="60"><br>
      <select name="cat">
              <?php


              foreach($catls as $ct){

                echo("<option value='".$ct->DescCat."'>".$ct->DescCat."</option>");
     }?>
                </select>
<input type="submit" value="Buscar">
</form>
