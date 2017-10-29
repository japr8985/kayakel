<?php 

namespace j4p\Kayakel;

use Exception;
use j4p\Kayakel\Kayakel;

/**
* 
*/
class KyDepartment
{
	var $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all departments and sub-departments in the help desk.
	* @return json || string || SimpleXmlElement || array
	*/
	public function listAllDepartment()
	{
		return $this->kayakel->getRequest('e=/Base/Department');
	}

	/**
	* Retrieve the department identified by its internal $id$.
	* @param string $id ID of department
	* @return json || string || SimpleXmlElement || array
	*/
	public function findDepartment($id)
	{
		return $this->kayakel->getRequest('e=/Base/Department/'.$id);	
	}

	/**
	* Update the department identified by $id.
	* @param string $id The unique numeric identifier of the department to update.
	* @param string $title The title of the department.
	* @return json || string || SimpleXmlElement || array
	*/
	public function updateDepartment($id,$data)
	{
		#code
	}

	/**
	* Create a department.
	* @param array $values 
	* @return json || string || SimpleXmlElement || array
	*/
	public function createDepartment($value)
	{
		if (!is_array($value))
			throw new Exception("A array is necesary to create a request");

		if (array_key_exists('title', $value))
			throw new Exception("title is required. The title of the department.");

		if (array_key_exists('app',$value))
			throw new Exception("The app is required. The app of the department should be associated with ('tickets' or 'livechat').");
		if (array_key_exists('type', $value))
			throw new Exception("The type is required. The accessibility level of the department ('public' or 'private').", 1);

		return $kayakel->postRequest($value,"e=/Base/Department/");
	}

	/**
	* Delete the Department identified by $id.
	* @param string $id Department's id 
	*/
	public function deleteDepartment($id)
	{
		return $this->kayakel->deleteRequest("/Base/Department/".$id);
	}
}
