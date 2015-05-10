<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `bempress` (
	`ID_empre` int(11) NOT NULL auto_increment,
	`namempresa` VARCHAR(255) NOT NULL,
	`nocli` VARCHAR(255) NOT NULL,
	`desce` TEXT NOT NULL,
	`tele` VARCHAR(255) NOT NULL,
	`rating` DECIMAL NOT NULL,
	`desccat` VARCHAR(255) NOT NULL, PRIMARY KEY  (`ID_empre`)) ENGINE=MyISAM;
*/

/**
* <b>bempress</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.2 / PHP5.1 MYSQL
* @see http://www.phpobjectgenerator.com/plog/tutorials/45/pdo-mysql
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5.1&wrapper=pdo&pdoDriver=mysql&objectName=bempress&attributeList=array+%28%0A++0+%3D%3E+%27NamEmpresa%27%2C%0A++1+%3D%3E+%27NoCli%27%2C%0A++2+%3D%3E+%27DescE%27%2C%0A++3+%3D%3E+%27TelE%27%2C%0A++4+%3D%3E+%27rating%27%2C%0A++5+%3D%3E+%27DescCat%27%2C%0A%29&typeList=array%2B%2528%250A%2B%2B0%2B%253D%253E%2B%2527VARCHAR%2528255%2529%2527%252C%250A%2B%2B1%2B%253D%253E%2B%2527VARCHAR%2528255%2529%2527%252C%250A%2B%2B2%2B%253D%253E%2B%2527TEXT%2527%252C%250A%2B%2B3%2B%253D%253E%2B%2527VARCHAR%2528255%2529%2527%252C%250A%2B%2B4%2B%253D%253E%2B%2527DECIMAL%2527%252C%250A%2B%2B5%2B%253D%253E%2B%2527VARCHAR%2528255%2529%2527%252C%250A%2529&classList=array+%28%0A++0+%3D%3E+%27%27%2C%0A++1+%3D%3E+%27%27%2C%0A++2+%3D%3E+%27%27%2C%0A++3+%3D%3E+%27%27%2C%0A++4+%3D%3E+%27%27%2C%0A++5+%3D%3E+%27%27%2C%0A%29
*/
include_once('class.pog_base.php');
class bempress extends POG_Base
{
	public $ID_empre = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $NamEmpresa;

	/**
	 * @var VARCHAR(255)
	 */
	public $NoCli;

	/**
	 * @var TEXT
	 */
	public $DescE;

	/**
	 * @var VARCHAR(255)
	 */
	public $TelE;

	/**
	 * @var DECIMAL
	 */
	public $rating;

	/**
	 * @var VARCHAR(255)
	 */
	public $DescCat;

	public $pog_attribute_type = array(
		"ID_empre" => array('db_attributes' => array("NUMERIC", "INT")),
		"NamEmpresa" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"NoCli" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"DescE" => array('db_attributes' => array("TEXT", "TEXT")),
		"TelE" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"rating" => array('db_attributes' => array("NUMERIC", "DECIMAL")),
		"DescCat" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		);
	public $pog_query;


	/**
	* Getter for some private attributes
	* @return mixed $attribute
	*/
	public function __get($attribute)
	{
		if (isset($this->{"_".$attribute}))
		{
			return $this->{"_".$attribute};
		}
		else
		{
			return false;
		}
	}

	function bempress($NamEmpresa='', $NoCli='', $DescE='', $TelE='', $rating='', $DescCat='')
	{
		$this->NamEmpresa = $NamEmpresa;
		$this->NoCli = $NoCli;
		$this->DescE = $DescE;
		$this->TelE = $TelE;
		$this->rating = $rating;
		$this->DescCat = $DescCat;
	}


	/**
	* Gets object from database
	* @param integer $ID_empre
	* @return object $bempress
	*/
	function Get($ID_empre)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `bempress` where `ID_empre`='".intval($ID_empre)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->ID_empre = $row['ID_empre'];
			$this->NamEmpresa = $this->Unescape($row['NamEmpresa']);
			$this->NoCli = $this->Unescape($row['Noli']);
			$this->DescE = $this->Unescape($row['DescE']);
			$this->TelE = $this->Unescape($row['TelE']);
			$this->rating = $this->Unescape($row['rating']);
			$this->DescCat = $this->Unescape($row['DescCat']);
		}
		return $this;
	}


	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...}
	* @param string $sortBy
	* @param boolean $ascending
	* @param int limit
	* @return array $bempressList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `bempress` ";
		$bempressList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$this->pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
					{
						$this->pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						if ($GLOBALS['configuration']['db_encoding'] == 1)
						{
							$value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(".$fcv_array[$i][2].")" : "'".$fcv_array[$i][2]."'";
							$this->pog_query .= "BASE64_DECODE(`".$fcv_array[$i][0]."`) ".$fcv_array[$i][1]." ".$value;
						}
						else
						{
							$value =  POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$this->Escape($fcv_array[$i][2])."'";
							$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
						}
					}
					else
					{
						$value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$fcv_array[$i][2]."'";
						$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
					}
				}
			}
		}
		if ($sortBy != '')
		{
			if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET')
			{
				if ($GLOBALS['configuration']['db_encoding'] == 1)
				{
					$sortBy = "BASE64_DECODE($sortBy) ";
				}
				else
				{
					$sortBy = "$sortBy ";
				}
			}
			else
			{
				$sortBy = "$sortBy ";
			}
		}
		else
		{
			$sortBy = "ID_empre";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$bempress = new $thisObjectName();
			$bempress->ID_empre = $row['ID_empre'];
			$bempress->NamEmpresa = $this->Unescape($row['NamEmpresa']);
			$bempress->NoCli = $this->Unescape($row['Nocli']);
			$bempress->DescE = $this->Unescape($row['DescE']);
			$bempress->TelE = $this->Unescape($row['TelE']);
			$bempress->rating = $this->Unescape($row['rating']);
			$bempress->DescCat = $this->Unescape($row['DescCat']);
			$bempressList[] = $bempress;
		}
		return $bempressList;
	}


	/**
	* Saves the object to the database
	* @return integer $ID_empre
	*/
	function Save()
	{
		$connection = Database::Connect();
		$rows = 0;
		if ($this->ID_empre!=''){
			$this->pog_query = "select `ID_empre` from `bempress` where `ID_empre`='".$this->ID_empre."' LIMIT 1";
			$rows = Database::Query($this->pog_query, $connection);
		}
		if ($rows > 0)
		{
			$this->pog_query = "update `bempress` set
			`namempresa`='".$this->Escape($this->NamEmpresa)."',
			`nocli`='".$this->Escape($this->NoCli)."',
			`desce`='".$this->Escape($this->DescE)."',
			`tele`='".$this->Escape($this->TelE)."',
			`rating`='".$this->Escape($this->rating)."',
			`desccat`='".$this->Escape($this->DescCat)."' where `ID_empre`='".$this->ID_empre."'";
		}
		else
		{
			$this->pog_query = "insert into `bempress` (`namempresa`, `nocli`, `desce`, `tele`, `rating`, `desccat` ) values (
			'".$this->Escape($this->NamEmpresa)."',
			'".$this->Escape($this->NoCli)."',
			'".$this->Escape($this->DescE)."',
			'".$this->Escape($this->TelE)."',
			'".$this->Escape($this->rating)."',
			'".$this->Escape($this->DescCat)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->ID_empre == "")
		{
			$this->ID_empre = $insertId;
		}
		return $this->ID_empre;
	}


	/**
	* Clones the object and saves it to the database
	* @return integer $ID_empre
	*/
	function SaveNew()
	{
		$this->ID_empre = '';
		return $this->Save();
	}


	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `bempress` where `ID_empre`='".$this->ID_empre."'";
		return Database::NonQuery($this->pog_query, $connection);
	}


	/**
	* Deletes a list of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...}
	* @param bool $deep
	* @return
	*/
	function DeleteList($fcv_array)
	{
		if (sizeof($fcv_array) > 0)
		{
			$connection = Database::Connect();
			$pog_query = "delete from `bempress` where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) !== 1)
					{
						$pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$this->Escape($fcv_array[$i][2])."'";
					}
					else
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$fcv_array[$i][2]."'";
					}
				}
			}
			return Database::NonQuery($pog_query, $connection);
		}
	}
}
?>
