<?php
namespace punit\text;
use punit\Text;

class Joined
	implements Text
{
	private $sources;

	public function __construct (Text ...$sources)
	{
		$this->sources = $sources;
	}

	public function __toString(): string
	{
		$str = "";
		foreach ($this->sources as $text) $str .= $text->__toString();
		return $str;
	}
}