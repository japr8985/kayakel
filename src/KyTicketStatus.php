<?php 
namespace j4p\Kayakel;

use j4p\Kayakel\Kayakel;
/**
* 
*/
class KyTicketStatus
{
	var $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;	
	}

	/**
	* listTicketStatus
	* Retrieve a list of all ticket statues in the help desk.
	* @return array
	*/
	public function listTicketStatus()
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketStatus");
	}
	
	/**
	* findTicketStatus
	* Retrieve the ticket status identified by $id$.
	* @param
	* @return array
	*/
	public function findTicketStatus($id)
	{
		if (!is_numeric($id))
			throw new Exception("Invalid id", 1);			
		
		return $this->kayakel->getRequest("e=/Tickets/TicketStatus/".$id);
	}
}