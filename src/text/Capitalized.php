<?php
namespace punit\text;
use punit\Text;

class Capitalized
	implements Text
{
	private $source;

	public function __construct (Text $source)
	{
		$this->source = $source;
	}

	public function __toString(): string
	{
		return ucfirst($this->source->__toString());
	}
}