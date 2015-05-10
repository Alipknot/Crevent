<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `search` (
	`searchid` int(11) NOT NULL auto_increment,
	`param1` VARCHAR(255) NOT NULL,
	`param2` VARCHAR(255) NOT NULL, PRIMARY KEY  (`searchid`)) ENGINE=MyISAM;
*/

/**
* <b>Search</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.2 / PHP5.1 MYSQL
* @see http://www.phpobjectgenerator.com/plog/tutorials/45/pdo-mysql
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5.1&wrapper=pdo&pdoDriver=mysql&objectName=Search&attributeList=array+%28%0A++0+%3D%3E+%27param1%27%2C%0A++1+%3D%3E+%27param2%27%2C%0A%29&typeList=array%2B%2528%250A%2B%2B0%2B%253D%253E%2B%2527VARCHAR%2528255%2529%2527%252C%250A%2B%2B1%2B%253D%253E%2B%2527VARCHAR%2528255%2529%2527%252C%250A%2529&classList=array+%28%0A++0+%3D%3E+%27%27%2C%0A++1+%3D%3E+%27%27%2C%0A%29
*/
include_once('class.pog_base.php');
class Search extends POG_Base
{
	public $searchId = '';

	/**
	 * @var VARCHAR(255)
	 */
	public $param1;

	/**
	 * @var VARCHAR(255)
	 */
	public $param2;

	public $pog_attribute_type = array(
		"searchId" => array('db_attributes' => array("NUMERIC", "INT")),
		"param1" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"param2" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
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

	function Search($param1='', $param2='')
	{
		$this->param1 = $param1;
		$this->param2 = $param2;
	}


	/**
	* Gets object from database
	* @param integer $searchId
	* @return object $Search
	*/
	function Get($searchId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `search` where `searchid`='".intval($searchId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->searchId = $row['searchid'];
			$this->param1 = $this->Unescape($row['param1']);
			$this->param2 = $this->Unescape($row['param2']);
		}
		return $this;
	}


	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...}
	* @param string $sortBy
	* @param boolean $ascending
	* @param int limit
	* @return array $searchList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `search` ";
		$searchList = Array();
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
			$sortBy = "searchid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$search = new $thisObjectName();
			$search->searchId = $row['searchid'];
			$search->param1 = $this->Unescape($row['param1']);
			$search->param2 = $this->Unescape($row['param2']);
			$searchList[] = $search;
		}
		return $searchList;
	}


	/**
	* Saves the object to the database
	* @return integer $searchId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$rows = 0;
		if ($this->searchId!=''){
			$this->pog_query = "select `searchid` from `search` where `searchid`='".$this->searchId."' LIMIT 1";
			$rows = Database::Query($this->pog_query, $connection);
		}
		if ($rows > 0)
		{
			$this->pog_query = "update `search` set
			`param1`='".$this->Escape($this->param1)."',
			`param2`='".$this->Escape($this->param2)."' where `searchid`='".$this->searchId."'";
		}
		else
		{
			$this->pog_query = "insert into `search` (`param1`, `param2` ) values (
			'".$this->Escape($this->param1)."',
			'".$this->Escape($this->param2)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->searchId == "")
		{
			$this->searchId = $insertId;
		}
	
		return $this->searchId;
	}


	/**
	* Clones the object and saves it to the database
	* @return integer $searchId
	*/
	function SaveNew()
	{
		$this->searchId = '';
		return $this->Save();
	}


	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `search` where `searchid`='".$this->searchId."'";
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
			$pog_query = "delete from `search` where ";
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
