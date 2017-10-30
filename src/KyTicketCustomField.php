<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* Custom field types
* The type of custom field (e.g. text area, select box) is denoted by a unique identifier.
* Field type 			| Identifier
*-------------------------------------
* Text 					|	1
* Text area 			|	2
* Password 				|	3
* Checkbox 				|	4
* Radio 				|	5
* Select 				|	6
* Multi select  		|	7
* Custom 				|	8
* Linked select fields 	|	9
* Date 					|	10
* File 					|	11
*/
class KyTicketCustomField
{
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* API supported in version > v4.01.220
	* @param string $ticketid
	* @return json || string || SimpleXmlElement || array
	*/
	public function searchTicketCustomField($ticketid)
	{
		$url = "e=/Tickets/TicketCustomField/".$ticketid;
		return $this->kayakel->gtRequest($url);
	}

	/**
	* API supported in version > v4.40.882
	* POST and PUT are not interchangeable. POST is only used to create a new record 
	* (so if you POST a custom field set to a ticket which already has a custom field set, 
	* it will overwrite the existing set).
	*/
	public function newCustomField($id,$fieldname)
	{
		# code...
	}
}