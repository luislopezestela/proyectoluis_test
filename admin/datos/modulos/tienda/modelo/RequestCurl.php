<?php
class RequestCurl{
	public $cookies = array();
	public function __construct()
	{
		$this->clearCookies();
	}
	public function getCurl()
	{
		$curl = new Curl();
		$curl->setUserAgent('');
		$curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
		$curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
		$curl->setOpt(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$curl->setOpt(CURLOPT_MAXREDIRS, 5);
		if (!empty($this->cookies)) {
			$curl->setCookies($this->cookies);
		}

		$curl->completeCallback = function (Curl $instance) {
			$this->cookies = array_merge($this->cookies, $instance->responseCookies);
			$instance->setCookies($this->cookies);
		};
		$curl->setConnectTimeout(15);
		$curl->setTimeout(30);
		return $curl;
	}
	public function clearCookies()
	{
		$this->cookies = [];
	}
}
