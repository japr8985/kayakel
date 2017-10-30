<?php 
namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;
/**
* 
*/
class KyTroubleshooterCategory
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}
	/**
	* Retrieve all troubleshooter categories.
	* @return 
	*/
	public function listAllCategories()
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Category");
	}

	/**
	* Retrieve the category identified by $id$.
	* @param string id Retrieve the category identified by $id$.
	* @return 
	*/
	public function search($id)
	{
		return $this->kayakel->getRequest("e=/Troubleshooter/Category/".$id);
	}

	/**
	* A new troubleshooter category.
	* @param array $values
	*/
	public function newTroubleshooter($values)
	{
		return $this->kayakel->postRequest($values,"e=/Troubleshooter/Category");
	}
	/**
	* Update category identified by $id$.
	* @param string id
	* @param array $values
	*/
	public function FunctionName($id,$values)
	{
		#putrequest
	}

	/**
	* Delete a troubleshooter category identified by $id
	* @param string id
	* @return 
	*/
	public function deleteTroubleshooter($id)
	{
		return $this->kayakel->deleteRequest("e=/Troubleshooter/Category/".$id);	
	}
}