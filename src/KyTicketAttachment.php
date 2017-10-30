<?php 	
namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;
/**
* 	
*/
class KyTicketAttachment
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of a ticket's attachments.
	* @param string $id The unique numeric identifier of the ticket.
	* @return
	*/
	public function list($id)
	{
		return $this->kayakel->getRequest("e/Tickets/TicketAttachment/ListAll/".$id);
	}

	/**
	* Retrieve the attachment identified by $id$ that belongs to a ticket identified by $ticketid$.
	* The attachment contents are base64@wikipedia encoded.
	* @param string tickedid The unique numeric identifier of the ticket.
	* @param string id The unique numeric identifier of the attachment.
	* @return
	*/
	public function search($ticketid,$id)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketAttachment/".$ticketid."/".$id);
	}

	/**
	* Retrieve a list of the ticket's attachments of the ticket post.
	* @param string tickedid The unique numeric identifier of the ticket.
	* @param string $ticketpostid$	The unique numeric identifier of the ticket post.
	* @return
	*/
	public function listAttachments($ticketid, $ticketpostid)
	{
		return $this->kayakel->getRequest("e=/Tickets/TicketPost/ListAll/".$ticketid."/".$ticketpostid);
	}

	/**
	* Add an attachment to a ticket post.
	* @param array $values
	*/
	public function addAttachment($values)
	{
		if (!is_array($values))
			throw new Exception("Array is necesary", 1);
			
		if (!array_key_exists("ticketid", $values))
			throw new Exception("ticketid is required and BASE64 encoded", 1);
		
		if (!array_key_exists("ticketpostid", $values))
			throw new Exception("ticketpostid is required and BASE64 encoded", 1);
		
		if (!array_key_exists("filename", $values))
			throw new Exception("filename is required", 1);

		if (!array_key_exists("contents", $values))
			throw new Exception("contents is required and BASE64 encoded", 1);

		$values['contents'] = base64_encode($values['contents']);
		
		return $this->kayakel->postRequest($values,"e=/Tickets/TicketAttachment");
	}
}