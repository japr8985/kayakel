<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyNewsComment
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		$this->kayakel = $kayakel;
	}

	/**
	* Retrieve a list of all the comments that belong to a given news item ID.
	* @param string $newsitemid The unique numeric identifier of the knowledgebase article.
	* @return 
	*/
	public function listCommnets($newsitemid)
	{
		return $this->kayakel->getRequest("e=/News/Comment/ListAll/".$newsitemid);
	}

	/**
	* Retrieve a comment identified by id.
	* @param string $id
	* @return 
	*/
	public function searchComment($id)
	{
		return $this->kayakel->getRequest("e=/News/Comment/".$id);
	}

	public function createComment($values)
	{
		if (!is_array($values)) throw new Exception("Array is required", 1);

		if (empty($vales['newsitemid'] || !isset($values['newsitemid'])))
			throw new Exception("newsitemid is required", 1);
			
		if (empty($vales['contents'] || !isset($values['contents'])))
			throw new Exception("contents is required", 1);

		if (empty($vales['creatortype'] || !isset($values['creatortype'])))
			throw new Exception("creatortype is required", 1);
			
		
		return $this->kayakel->postRequest($values,"e=/News/Comment");
	}

	public function deleteComment($id)
	{
		return $this->kayakel->deleteRequest("e=/News/Comment/".$id);
	}
}