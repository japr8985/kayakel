<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyTroubleshooterStep
{
	
	private $kayakel;
	
	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	public function listAll()
	{
		return $this->kayakel->getRequest('e=/Troubleshooter/Step');
	}

	public function search($id)
	{
		return $this->kayakel->getRequest('e=/Troubleshooter/Step/'.$id);
	}

	public function create($values)
	{
		return $this->kayakel->postRequest($values,'e=/Troubleshooter/Step');
	}

	public function update()
	{
		# code...
	}

	public function delete($id)
	{
		return $this->kayakel->deleteRequest("e=/Troubleshooter/Step/")
	}
}