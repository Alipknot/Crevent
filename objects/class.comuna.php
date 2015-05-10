<?php

class Comuna
{
	private $db;
	public function __construct()

  {
	  include(__DIR__ .'/../config.php');
	  $this->db = $db;

  }

	public $pog_query;
	function GetList()
	{
		$db = $this->db;

			$pog_query = "select * from Comuna";
			$stmt = $db->prepare($pog_query);
			$stmt->execute();

				$result= $stmt->get_result();
				while($row = $result->fetch_object() )
	{
	$rows[]=$row;
	}
	return $rows;






}
}

?>
