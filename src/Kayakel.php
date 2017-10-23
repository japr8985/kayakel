<?php

namespace j4p\Kayakel;

class Kayakel
{
    private $url;
	private $secret;
	private $key;
	private $salt;
	private $signature;
	private $encodedSignature;
	
	public function __construct($url = '', $key = '', $secret = '')
	{
		
		$this->url = $url.'index.php?';
		$this->key = $key;
		$this->secret = $secret;
		$this->salt = mt_rand();
		$signature = hash_hmac('sha256',$this->salt,$this->secret,true);
		$this->signature = base64_encode($signature);//para solicitudes POST
		$this->encodedSignature = urlencode(base64_encode($signature));
    }
    /**
	* createQueryRoute
	* @param string $url direccion del API a la cual sera hara peticion
	* @param array $sec arreglo de valores con la autenticacion
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
	* getRequest
	* @param string $url direccion del API a la cual se hara la peticion
	* @return json
	*/
	private function getRequest($url)
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

		$xml = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
		$response = json_encode($xml);
		return $response;
	}
	/**
	* createBoddyPostRequest
	* @param array $val arreglo con los elementos a enviar a la solicitud por POST
	* @return json
	*/
	private function createBodyPostRequest($val)
	{
		$val['apikey'] = $this->key;
		$val['salt'] = $this->salt;
		$val['signature'] = $this->signature;

		$data = http_build_query($val,'','&');
		return $data;
	}

	/**
	* posrtRequest
	* @param array $value Valores del cuerpo de la solicitud
	* @param string $to direccion del API a la cual se hara la peticion
	* @return json
	*/
	private function postRequest($value,$to)
	{
		$url = $this->url.$to;
		$value = $this->createBodyPostRequest($value);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $value);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			throw new Exception(curl_errno($ch).': '.curl_error($ch));
			
		}
		curl_close($ch);
		$xml = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
		$response = json_encode($xml);
		return $response;
	}
}
