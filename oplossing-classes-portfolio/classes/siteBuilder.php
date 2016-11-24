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
		$content = file_get_contents($this->headerfile);
		$content= str_replace("</head>", $this->addLinks(true) . "</head>", $content);
		file_put_contents($this->headerfile, $content);
	}

	public function buildFooter()
	{
		$content = file_get_contents($this->footerfile);

		$content= str_replace("</body>", $this->addLinks(false) . "</body>", $content);
		file_put_contents($this->footerfile, $content);
	}

	private function addLinks($isCSS)
	{
		$linkList = "";
		if ($isCSS) { // load css files
			foreach (glob("css/*.css") as $filename) {
				$linkList .= "<link rel='stylesheet' href='" . $filename . "' type='text/css'>";
			}

		} else { // load js files

			foreach (glob("js/*.js") as $filename) {
				$linkList .= "<script type='text/javascript' src=\"" . $filename . "\"></script>";
			}
		}
		return $linkList;
	}
}