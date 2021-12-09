<?php
namespace Punit\Output;

class CamelCaseToText
	implements Text
{
	private $text;

	public function __construct (Text $text)
	{
		$this->text = $text;
	}

	public function __toString (): string
	{
		return ucfirst(
			trim(
				preg_replace_callback(
					"/([A-Z]([a-z])*)/",
					function (array $matches) { return strtolower($matches[0]) . " "; },
					$this->text
				)
			)
		);
	}
}