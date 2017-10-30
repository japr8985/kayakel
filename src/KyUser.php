<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyUser
{
	
	private $kayakel;
	
	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all users in the help desk starting from a marker (user id) till the item fetch limit is 
	* reached (by default this is 1000).
	* @param string $marker
	* @param string $maxitems
	*/
	public function listAllUser($marker = '',$maxitems = '')
	{
		$url = "/Base/User/Filter";
		if (isset($marker) && !empty($marker))
			$url .= '/'.$marker;
		if (isset($maxitems) && !empty($maxitems))
			$url .= '/'.$maxitems;
		
		return $this->kayakel->getRequest($url)
	}

	/**
	* Retrieve the user identified by $id$.
	* @param string $id
	*/
	public function search($id)
	{
		return $this->kayakel->getRequest("e=/Base/User/".$id);
	}

	/**
	*
	* @param string id
	* @param array valore
	*/
	public function update($id,$values)
	{
		# code...
	}

	public function create($values)
	{
		return $this->kayakel->postRequest($values,"e=/Base/User");
	}

	/**
	* Delete the user identified by $id$.
	*
	*/
	public function delete($id)
	{
		return $this->kayakel->deleteRequest("e=/Base/User/".$id);
	}
}