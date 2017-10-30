<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTicketPriority
{
	var $kayakel;
	
	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all ticket priorities and their properties.
	* @return json || string || SimpleXmlElement || array
	*/
	public function listAllPriority()
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketPriority");
	}

	/**
	* Retrieve a specific ticket priority
	* @param string $id ID of priority
	*/
	public function searchTicketPriority($id)
	{
		if (is_null($id))
			throw new Exception("ID is required to Retrieve a specific ticket priority ", 1);

		return $this->kayakel->getRequest("e=/Tickets/TicketPriority/".$id);
	}
}