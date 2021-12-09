<?php
namespace punit\text;
use punit\Text;

class NormalCase
	implements Text
{
	private $source;

	public function __construct (Text $source)
	{
		$this->source = new Trimmed($source);
	}

	public function __toString(): string
	{
		return preg_replace_callback(
			"/([A-Z]([a-z])*)/",
			function (array $matches) {
				return " " . strtolower($matches[0]);
			},
			$this->source->__toString()
		);
	}
}