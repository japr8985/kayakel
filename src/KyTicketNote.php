<?php 

namespace j4p\Kayakel;
use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTicketNote
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* API modified in version > v4.01.220
	* Retrieve a list of a ticket's notes.
	* @param string $id
	* @return 
	*/
	public function listAll($ticketid)
	{
		$url = "e=/Tickets/TicketNote/ListAll/"$ticketid;

		return $this->kayakel->getRequest($url);
	}

	/**
	* API modified in version > v4.01.220
	* Retrieve the note identified by $id that belongs to a ticket identified by $ticketid.
	* @param string $ticketid
	* @param string $id
	* @return 
	*/
	public function searchTicketNote($ticketid,$id)
	{
		return $this->kayakel->getRequest("e/Tickets/TicketNote/".$ticketid."/."$id);
	}

	/**
	* Add a new note to a ticket.
	* @param array $values
	* @return 
	*/
	public function newTicketNote($values)
	{
		return $this->kayakel->postRequest($values,"e=/Tickets/TicketNote");
	}

	public function deleteTicketNote($ticketid,$id)
	{
		return $this->kayakel->deleteRequest("e=/Tickets/TicketNote/".$ticketid."/".$id);
	}
}