<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KnowledgebaseCategory
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}
	/**
	* Retrieve a list of all categories.
	* @param $coutn Items count for retrieval
	* @param $start Start item for retrieval
	* @param $sortField Sort items according to a single specified field
	* @param $sortOrder Sort items according to a single specified order
	* @return 
	*/
	public function listCategories($count,$start,$sortField,$sortOrder)
	{
		$url = "/Knowledgebase/Category/ListAll/".$count."/".$start."/".$sortField."/".$sortOrder;

		return $this->kayakel->getRequest($url);
	}
	/**
	* Retrieve a category identified by id.
	* @param $id The unique numeric identifier of the knowledgebase category.
	* @return 
	*/
	public function searchCategory($id)
	{
		return $this->kayakel->getRequest("e=/Knowledgebase/Category/".$id);
	}

	/**
	* Retrieve a category identified by id.
	* @param array $values
	* @return 
	*/
	public function newCategory($values)
	{
		if (!is_array($values))
			throw new Exception("Array is required", 1);

		if (!isset($values['title']) || !array_key_exists('title', $values)) throw new Exception("Title is required", 1);
		if (!isset($values['categorytype']) || !array_key_exists('categorytype', $values))
			throw new Exception("categorytype is required", 1);

		return $this->kayakel->postRequest($values,"e=/Knowledgebase/Category/");
	}
	/**
	* Delete a knowledgebase category identified by id
	* @param string id The unique numeric identifier of the article.
	*/
	public function deleteCategory($id)
	{
		return $this->kayakel->deleteRequest("e=/Knowledgebase/Category/".$id);
	}

	/**
	* Update the knowledgebase category identified by $id$..
	* @param string $id
	* @param array $values
	*/
	public function updateCategory($id,$values)
	{
		if (!is_array($values)) throw new Exception("updateCategory(string $id, array $values)", 1);
		
		if (!isset($values['title'])) throw new Exception("Field title is required", 1);

		#return $this->kayakel->putRequest();
		
	}
}