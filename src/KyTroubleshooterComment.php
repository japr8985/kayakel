<?php 
namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;
/**
* 
*/
class KyTroubleshooterComment
{
	private $kayakel;
	
	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}
	/**
	* GET /Troubleshooter/Comment/ListAll/$stepid$
	* Retrieve a list of all the comments that belong to a given troubleshooter step ID.
	* @param string id
	* @return 
	*/
	public function listAllComments($id)
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Comment/ListAll/".$id);
	}
	/**
	* GET /Troubleshooter/Comment/$id$
	* Retrieve a comment identified by $id$.
	* @param string id
	*/
	public function search($id)
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Comment/".$id);
	}
	
	/**
	* Create a new troubleshooter step comment.
	* @param array values
	*/
	public function create($values)
	{
		return $this->kayakel->postRequest($values,"e=/Troubleshooter/Comment");
	}
	/**
	* Delete a troubleshooter comment identified by $id$
	* @param string id
	*/
	public function deleteTroubleshooter($id)
	{
		return $this->kayakel->deleteRequest("e=/Troubleshooter/Comment/".$id);
	}
}