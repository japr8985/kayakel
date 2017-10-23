<?php
namespace j4p\Kayakel;

use j4p\Kayakel\Kayakel;

class KyTicket extends Kayakel
{
	
    /**
	* Creacion de tickets
	* @param array $val arreglo con todos los valores correspondiente para la creacion de ticket
	* @return json
	*/
	public function createTicket($val)
	{
		if (!is_array($val))
			throw new Exception("Formato de solicitud no valida");			
		
		return $this->postRequest($val,"e=/Tickets/Ticket");
	}
	/**
	* getFindTicket
	* Retrieve the ticket identified by $ticketid$.
	* @param The unique numeric identifier of the ticket or the ticket mask ID (e.g. ABC-123-4567)
	* @return json
	*/
	public function findTicket($id)
	{
		if (is_null($id) || empty($id))
			throw new Exception("Se requiere un id de ticket");
			
		return $this->getRequest("e=/Tickets/Ticket/".$id);
	}
	

	/**
	*
	*/
	public function updateTicket($id,$values)
	{
		if (is_null($id) || !is_numeric($id)) 
			throw new Exception("Ticket id not valid", 1);	

		return $this->putRequest("e=/Tickets/Ticket/".$id,$values);
	}
	
	/**
	* deleteTicket
	* 
	* @param string $id Ticket Id
	* @return json response
	*/
	public function deleteTicket($id)
	{
		if (is_null($id) || !is_numeric($id))
			throw new Exception("Ticket id not valid");			
		
		return $this->deleteRequest("e=/Tickets/Ticket/".$id);
	}
	/**
	* getTicketTypes
	* Regresa un arreglo con todos los tipos de tickets [1 ->Issue,2 ->Task,3 ->Bug,4->Feedback]
	* @return json response 
	*/
	public function ticketTypes()
	{
		return $this->getRequest("e=/Tickets/TicketType");
	}

	/**
	* getTicketStatus
	* 
	* @return json array
	*/
	public function ticketStatus()
	{
		return $this->getRequest("e=/Tickets/TicketStatus");
	}

	/**
	* findTicketStatus
	* Retrieve the ticket identified by $ticketid$.
	* @param $id The unique numeric identifier of the ticket or the ticket mask ID (e.g. ABC-123-4567).
	* @return json
	*/
	public function findTicketStatus($id)
	{
		return $this->getRequest("e=/Tickets/TicketStatus/".$id);
	}
}
