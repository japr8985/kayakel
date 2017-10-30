<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTicketCount
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* API supported in version > v4.01.220
	* Retrieve a list of counts for different departments, ticket status'es, owners etc.
	*/
	public function list()
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketCount");
	}
}