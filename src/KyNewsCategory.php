<?php 	
namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 	
*/
class KyNewsCategory
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve the list of categories.
	*/
	public function listCategories()
	{
		return $this->kayakel->getRequest("e=/News/Category");
	}

	/**
	*Retrieve a category identified by $id.
	*/
	public function searchCategory($id)
	{
		return $this->kayake->getRequest("e=/News/Category/".$id);
	}
	/**
	* Create a new news category.
	* @param array $values
	*/
	public function newCategory($values)
	{
		if (!is_array($values))
			throw new Exception("Required a array", 1);
		
		if (!isset($values['title']) || empty($values['title']))
			throw new Exception("'title' is required", 1);

		if (!isset($values['visibilitytype']) || empty($values['visibilitytype'])) 
			throw new Exception("'visibilitytype' is required", 1);

		return $this->kayakel->postRequest($values,"e=/News/Category");			
	}

	/**
	* Delete a news category identified by $id
	* @param string $id
	*/
	public function deleteCategory($id)
	{
		return $this->kayakel->deleteRequest("e=/News/Category/".$id);
	}

	/**
	* Update the news category identified by $id$
	*
	*/
	public function updateCategory($values)
	{
		if (!is_array($values))
			throw new Exception("Required a array", 1);
		
		if (!isset($values['title']) || empty($values['title']))
			throw new Exception("'title' is required", 1);

		if (!isset($values['visibilitytype']) || empty($values['visibilitytype'])) 
			throw new Exception("'visibilitytype' is required", 1);

		return $this->kayakel->updateRequest($values,"e=/News/Category/".$id)
	}
}