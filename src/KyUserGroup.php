<?php 
namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;
/**
* 
*/
class KyUserGroup
{
	
	private $kayakel;
	
	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	public function list()
	{
		return $this->kayakel->getRequest("/Base/UserGroup");
	}

	public function search($id)
	{
		return $this->kayakel->getRequest("/Base/Group/".$id);
	}

	public function update($values,$id)
	{
		# code...
	}

	public function create($values)
	{
		return $this->kayakel->postRequest($values,"e=/Base/UserGroup");
	}

	public function delete($id)
	{
		return $this->kayakel->deleteRequest("e=/Base/UserGroup/".$id);
	}
}