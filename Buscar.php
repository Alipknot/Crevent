
<?php
include(__DIR__ .'/objects/class.categoria.php');
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
include(__DIR__ .'/objects/class.comuna.php');
$Categoria = new Categoria();
$catls= $Categoria->GetList();
$comuna = new Comuna();

$com=$comuna->GetList();




?>
<form action="busqueda.php" method="POST">
Buscar:<br>
<input type="text" name="busqueda" size="60"><br>
      <select name="cat">
        <option value="" selected >----</option>
              <?php


              foreach($catls as $ct){

                echo("<option value='".$ct->DescCat."'>".$ct->DescCat."</option>");
     }?>
                </select>
                <select name="com">
                  <option value="" selected >----</option>
                        <?php


                        foreach($com as $x){


                          echo("<option value='".$x->NamComuna."'>".$x->NamComuna."</option>");
               }?>
                          </select>
<input type="submit" value="Buscar">
</form>
