<?php
namespace punit\text;
use punit\Text;

class DefaultText
	implements Text
{
	private $str;

	public function __construct (string $str)
	{
		$this->str = $str;
	}

	public function __toString(): string
	{
		return $this->str;
	}
}