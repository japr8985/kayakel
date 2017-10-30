<?php 
namespace j4p\Kayakel;
use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTicketPost
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all the ticket posts that belong to a ticket given ticket's id.
	* @param string id
	* @return 
	*/
	public function listAllTIcketPost($id)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketPost/ListAll/".$id);
	}
	/**
	* Retrieve the post identified by $id$ that belong to the ticket identified by $ticketid$.
	* @param string id
	* @param string ticketid
	* @return 
	*/
	public function searchTicketPost($id,$ticketid)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketPost/".$ticketid."/".$id);	
	}
	/**
	* A new post to an existing ticket.
	* @param array
	* @return 
	*/
	public function newTicketPost($values)
	{
		return $this->kayakel->getRequest($values,"e=/Tickets/TicketPost");	
	}
	/**
	* Delete a ticket post identified by $id$ which belongs to a ticket identified by $ticketid.
	* @param string id
	* @return 
	*/
	public function deleteTicketPost($ticketid,$id)
	{
		return $this->kayakel->deleteRequest("e=/Tickets/TicketPost/".$ticketid."/".$id);
	}
}