<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTicketType
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all the ticket types in the help desk.
	* @return json || string || SimpleXmlElement || array
	*/
	public function listAllTicketType()
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketType");
	}

	/**
	* Retrieve the ticket type identified by ID
	* @param string $id
	* @return json || string || SimpleXmlElement || array
	*/
	public function searchTicketType($id)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketType");
	}
}