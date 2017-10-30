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

	/**
	* Retrieve all the troubleshooter steps
	*/
	public function allSteps()
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Step");
	}
	/**
	* Retrieve the troubleshooter step identified by $id$.
	* @param string
	**/
	public function newTroubleshhoter($values){
		return $this->kayakel->postRequesta($values,"e=/Troubleshooter/Step")
	}

	public function deleteToublrshhooter($id)
	{
		return $this>kayakel->deleteRequest("")
	}
}