<?php
namespace j4p\Kayakel;

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
		
		$result = $this->postRequest($val,"e=/Tickets/Ticket");
		
		return $result;	
	}
	/**
	* getFindTicket
	* Retrieve the ticket identified by $ticketid$.
	* @param The unique numeric identifier of the ticket or the ticket mask ID (e.g. ABC-123-4567)
	* @return json
	*/
	public function getFindTicket($id)
	{
		if (is_null($id) || empty($id))
			throw new Exception("Se requiere un id de ticket");
			
		return $this->getRequest("e=/Tickets/Ticket/".$id);
	}
	

	#updateTicket
	#deleteTicket
	

	/**
	* getTicketTypes
	* Regresa un arreglo con todos los tipos de tickets [1 ->Issue,2 ->Task,3 ->Bug,4->Feedback]
	* @return json array 
	*/
	public function getTicketTypes()
	{
		return $this->getRequest("e=/Tickets/TicketType");
	}

	/**
	* getTicketStatus
	* Regresa un array con todos los status registrados en kayako
	* [
	*		[id - 4, title - Open...]
	*		[id - 5, title - On Hold...]
	*		[id - 6, title - Closed...]
	*	]
	* @return json array
	*/
	public function getTicketStatus()
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
