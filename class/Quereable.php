<?php
class Quereable {

private $db;

 public function __construct()

  {
	  include(__DIR__ .'/../config.php');
	  $this->db = $db;

  }
  public function GetParam1()
  {
    $db = $this->db;
    $query = "SELECT * FROM (SELECT param1 as 'Categoria', count(param1) as 'Total Busquedas'
     FROM `search` WHERE param1!='' GROUP BY param1)as tmp ORDER BY `tmp`.`Total Busquedas` DESC" ;
    $result =$db->query($query);
    while($row = $result->fetch_array())
    {
    $rows[] = $row;

    }
    return $rows;

}
public function GetParam2()
{
  $db = $this->db;
  $query = "SELECT param2 as 'Comuna', count(param2)as 'Total Busquedas' FROM `search` WHERE param2!='' GROUP BY param2 ORDER BY `Total Busquedas` DESC ";
  $result =$db->query($query);
  while($row = $result->fetch_array())
  {
  $rows[] = $row;

  }
  return $rows;

}
 public function GetBoth()
{


$db = $this->db;
$query ="SELECT param1 as 'Categoria', param2 as 'Comuna', COUNT(param2) as 'Total Busquedas' FROM `search` where
param1!='' AND param2!='' GROUP BY param1,param2 ORDER BY `Total Busquedas` DESC";
$result =$db->query($query);
while($row = $result->fetch_array())
{
$rows[] = $row;

}
return $rows;
}
}
?>
