<?php
namespace punit\text;
use punit\Text;

abstract class TextWrapper
	implements Text
{
	private $source;

	protected function __construct (Text $source)
	{
		$this->source = $source;
	}

	public function __toString(): string
	{
		return $this->source->__toString();
	}
}