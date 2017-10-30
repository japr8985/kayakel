<?php 	

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyNewsSubscriber
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		return $this->kayakel = $kayakel;
	}
	/**
	* Retrieve all subscribers
	* @return 
	*/
	public function allSubscribers()
	{
		return $this->kayakel->getRequest('e=/News/Subscriber');
	}
	
	/**
	* Retrieve the subscriber identified by $id$.
	* @param string id The unique numeric identifier of the subscriber.
	* @return 
	*/
	public function searchSubscriber($id)
	{
		return $this->kayakel->getRequest('e=/News/Subscriber/'.$id);
	}
	/**
	* A new news subscriber
	* @param array $values
	* @return
	*/
	public function newSubscriber($values)
	{
		return $this->kayakel->postRequest($values,"e=/News/Subscriber");
	}
	
	/**
	* Update news subscriber identified by $id
	* @param string id
	* @return 
	*/
	public function updateSubscriber($value)
	{
		# code...
	}
	/**
	* Delete a news subscriber identified by $id$
	* @param string id
	* @return 
	*/
	public function deleteSubscriber($id)
	{
		return $this->kayakel->deleteRequest("e=/News/Subscriber/".$id);
	}
}