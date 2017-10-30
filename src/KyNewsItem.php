<?php 

namespace j4p\Kayakel;

use j4p\Kayakel
use Exception;

/**
* 
*/
class KyNewsItem
{
	
	private $kayakel;

	function __construct(Kayakel $kayakel)
	{
		return $this->kayakel = $kayakel;
	}
	/**
	* Delete a news item identified by $id$
	* @param string $id
	* @return
	*/	
	public function deleteNewsItem($id)
	{
		return $this->kayakel->deleteRequest("e=/News/NewsItem/".$id);
	}
	/**
	*
	* @param array $values
	* @return
	*/
	public function putNewsItem($values)
	{
		#return $this->kayakel->putRequest("e=/News/NewsItem/");
	}
	/**
	*
	* @param array $values
	* @return
	*/
	public function newNewsItem($values)
	{
		if (!is_array($values)) throw new Exception("A array is required", 1);

		if (empty($vales['subject'] || !isset($values['subject'])))
			throw new Exception("subject is required", 1);
			
		if (empty($vales['contents'] || !isset($values['contents'])))
			throw new Exception("contents is required", 1);

		if (empty($vales['staffid'] || !isset($values['staffid'])))
			throw new Exception("staffid is required", 1);
		
		return $this->kayakel->postRequest($values,"e=/News/NewsItem");
	}
	/**
	* Retrieve the news item identified by $id$.
	* @param string $id
	* @return
	*/
	public function searchNewsItem($id)
	{
		return $this->kayakel->getRequest("e=/News/NewsItem/".$id);
	}
	/**
	* Retrieve the list of newsitem
	* @param
	* @return
	*/
	public function listNewsItem($value='')
	{
		return $this->kayakel->getRequest("e=/News/NewsItem/");
	}
	/**
	* Retrieve the news item identified by $categoryid$.
	* @param
	* @return
	*/
	public function FunctionName($id)
	{
		return $this->kayakel->getRequest("e=/News/NewsItem/ListAll/".$id);
	}
}