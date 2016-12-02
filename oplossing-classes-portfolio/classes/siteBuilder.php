<?php

class siteBuilder
{
	protected $headerfile;
	protected $bodyfile;
	protected $footerfile;

	public function __construct($header, $body, $footer)
	{
		$this->headerfile = $header;
		$this->bodyfile = $body;
		$this->footerfile = $footer;
	}


	public function buildHeader()
	{
		return $this->addLinks("css/*.css");
	}

	public function buildFooter()
	{
		return $this->addLinks("js/*.js");
	}

	private function addLinks($from)
	{
		$linkList = [];
			foreach (glob($from) as $filename) {
				array_push($linkList,$filename);
			}
		return $linkList;
	}
}