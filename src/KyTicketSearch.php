<?php 

namespace j4p\Kayakel;
use j4p\Kayakel
use Exception;

/**
* 
*/
class TicketSearch
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Run a search on tickets. You can combine the search factors to make the search span multiple areas. 
	* For example, to search the full name, contents and email you can send the arguments as: 
	* query=John&fullname=1&email=1&contents=1
	* @param string $query
	* @param array value
	* @return
	*/
	public function search($values)
	{
		return $this->kayakel->postRequest($values,"e=/Tickets/TicketSearch");
	}
}