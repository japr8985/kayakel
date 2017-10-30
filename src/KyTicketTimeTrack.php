<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTicketTimeTrack
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* API supported in version > v4.01.220
	* Retrieve a list of a ticket's time track notes.
	* @param string $id
	* @return json || string || SimpleXmlElement || array
	*/
	public function listAllTicketTimeTrack($id)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketTimeTrack/ListAll/".$id);
	}

	/**
	* TicketTimeTrack
	* API supported in version > v4.01.220
	* Retrieve the time tracking note identified by $id$ that belongs to a ticket identified by $id.
	* @param string $ticketid
	* @param string $id
	* @return json || string || SimpleXmlElement || array
	*/
	public function timeTrack($ticketid,$id)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketTimeTrack/".$ticketid."/".$id);
	}

	/**
	* API supported in version > v4.01.220
	* Add a new time tracking note to a ticket.
	* @param array $value
	* @return json || string || SimpleXmlElement || array
	*/
	public function newTimeTrack($value)
	{
		return $this->kayakel->postRequest($value,"e=/Tickets/TicketTimeTrack");
	}

	/**
	* API supported in version > v4.01.220
	* Delete the ticket time tracking note identified by $id$ linked to the $ticketid.
	* @param string $ticketid
	* @param string $id
	* @return json || string || SimpleXmlElement || array
	*/
	public function deleteTimeTrack($ticketid,$id)
	{
		$url = "/Tickets/TicketTimeTrack/".$ticketid."/".$id;
		
		return $this->kayakel->deleteRequest($url);
	}
}
