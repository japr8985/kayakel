<?php

namespace j4p\Kayakel;
use Exception;

class Kayakel
{
	/**
	* @var url of helpdesk
	*/
    private $url;
    /**
    * @var secret key string of kayako
    */
	private $secret;
	/**
	* @var key api key of kayako
	*/
	private $key;
	/**
	* @var random salt for every request
	*/
	private $salt;
	/**
	* @var hash of salt and secret key
	*/
	private $signature;
	/**
	* @var encode the hash for get request
	*/
	private $encodedSignature;
	/**
	* @var type of output can be json, array, xml, simplexml
	*/
	public $output;

	public function __construct($url = '', $key = '', $secret = '')
	{
		
		$this->url = $url.'index.php?';
		$this->key = $key;
		$this->secret = $secret;
		$this->salt = mt_rand();
		$signature = hash_hmac('sha256',$this->salt,$this->secret,true);
		$this->signature = base64_encode($signature);//para solicitudes POST
		$this->encodedSignature = urlencode(base64_encode($signature));

		$this->output = 'json';
    }
    /**
	* Building the route to make a GET request
	* @param string $url 
	* @return string 
	*/
	private function createQueryRoute($url)
	{
		$val = [
			'apikey' => $this->key,
			'salt' => $this->salt,
			'signature' => $this->signature
		];
		$url .= '&'.http_build_query($val);
		
		return $url;
	}

	/**
	* Set type of output
	* @param string $format a valid output
	*/
	public function setTypeOutput($format)
	{
		if ($format != 'SimpleXMLElement' && $format != 'json' && $format != 'array') 
			throw new Exception('json, SimpleXMLElement, array and simplexml are the only allowed values for set_output');		
		
		$this->output = $format;
	}
	/**
	* Get type of output
	* @return string type of output define
	*/

	public function getTypeOutput(){
		return $this->output;
	}

	/**
	* GET request
	* @param string $url 
	* @return json
	*/
	public function getRequest($url)
	{
		$url = $this->url.$this->createQueryRoute($url);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$result = curl_exec($ch);

		if (curl_errno($ch)) 
			throw new Exception(curl_errno($ch).': '.curl_error($ch));

		curl_close($ch);

		return $this->response($result);
	}
	/**
	* createBoddyPostRequest
	* @param array $val arreglo con los elementos a enviar a la solicitud por POST
	* @return json
	*/
	private function createBody($val)
	{
		$val['apikey'] = $this->key;
		$val['salt'] = $this->salt;
		$val['signature'] = $this->signature;

		$data = http_build_query($val,'','&');
		return $data;
	}

	/**
	* postRequest
	* @param array $value Valores del cuerpo de la solicitud
	* @param string $to direccion del API a la cual se hara la peticion
	* @return json
	*/
	public function postRequest($value,$to)
	{
		$url = $this->url.$to;
		$value = $this->createBody($value);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $value);

		$result = curl_exec($ch);
		
		if (curl_errno($ch)) 
			throw new Exception(curl_errno($ch).': '.curl_error($ch));

		curl_close($ch);
		
		return $this->response($result);
	}


	/**
	* putRequest
	* Make a request using PUT method
	* @param int $id
	* @param array $body with fields to update
	* @param string $to part of url
	* @return json
	*/
	public function putRequest($url,$body)
	{
		$url = $this->url.$url;
		$val['apikey'] = $this->key;
		$val['salt'] = $this->salt;
		$val['signature'] = $this->signature;

		$url .= '&'.http_build_query($val,'','&');
		$opts = ['http' =>[
  	    	'method' => "PUT"
			]
		];

		$context  = stream_context_create($opts);
		
  		return file_get_contents($url, false, $context);
		
	}

	private function createDeleteQuery($url)
	{
		$val['apikey'] = $this->key;
		$val['salt'] = $this->salt;
		$val['signature'] = $this->signature;

		return $url.'&'.http_build_query($val,'','&');
	}
	public function deleteRequest($url)
	{
		$url = $this->createDeleteQuery($this->url.$url);
		$opts = ['http' =>[
  	    	'method' => "DELETE"
			]
		];
  		
  		$context  = stream_context_create($opts);
		
  		return file_get_contents($url, false, $context);
	}

	/**
	* response
	* Cast simple xml to json
	* @param
	* @return json || array
	*/
	private function response($result)
	{
		libxml_use_internal_errors(true);

		$xml = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
		
		if (!$xml) {
			return $this->__output(['success' => false, 'error' => $result]);
		}
		
		//return json_decode(json_encode($xml),true);
		return $this->__output($xml);
	}

	private function __output($value)
	{
		switch ($this->output) {
			case 'SimpleXMLElement':
				return $value;
			case 'array':
				return json_decode(json_encode($value),true);
			case 'json':
				return json_encode($value);			
			default:
				# code...
				break;
		}
	}

}
