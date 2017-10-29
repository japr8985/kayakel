<?php
namespace j4p\Kayakel;

use Exception;
use j4p\Kayakel\Kayakel;

class KyTicket
{
	private $kayakel;

	public function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;	
    }

    /**
    * Retrieve a filtered list of tickets from the help desk.
    *
    */
    public function listAll()
    {
    	$args = func_get_args();
    	if (empty($args)) 
    		throw new Exception("Specified department id");
    	
    	$department = $args[0];
    	$url = "e=/Tickets/Ticket/ListAll/".$department;

    	for ($i=1; $i < count($args) ; $i++) { 
    		$url .= '/'.$args[$i];
    	}

    	return $this->kayakel->getRequest($url);
    }
    /**
	* Creacion de tickets
	* @param array $val arreglo con todos los valores correspondiente para la creacion de ticket
	* @return json
	*/
	public function createTicket($val)
	{
		if (!is_array($val))
			throw new Exception("Need a array");			
		
		
		return $this->kayakel->postRequest($val,"e=/Tickets/Ticket");
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
			
		return $this->kayakel->getRequest("e=/Tickets/Ticket/".$id);
	}
	

	/**
	*
	*/
	public function updateTicket($id,$values)
	{
		if (is_null($id) || !is_numeric($id)) 
			throw new Exception("Ticket id not valid", 1);	

		return $this->kayakel->putRequest("e=/Tickets/Ticket/".$id,$values);
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
		
		return $this->kayakel->deleteRequest("e=/Tickets/Ticket/".$id);
	}
}
