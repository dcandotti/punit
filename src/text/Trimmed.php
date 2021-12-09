<?php
namespace punit\text;
use punit\Text;

class Trimmed
	implements Text
{
	private $source;

	public function __construct (Text $source)
	{
		$this->source = $source;
	}

	public function __toString(): string
	{
		return trim($this->source->__toString());
	}
}