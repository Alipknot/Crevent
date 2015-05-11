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
		
				$stmt->bind_result($col1);
  $devices = array();

    while($stmt->fetch()) {
        $tmp = array();
        $tmp["NamComuna"] = $col1;
        array_push($devices, $tmp);
    }
    $stmt->close();
    return $devices;

}
}

?>
