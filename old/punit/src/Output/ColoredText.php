<?php
namespace Punit\Output;

class ColoredText
	implements Text
{
	private $text;
	private $color;

	public function __construct (Text $text, int $color)
	{
		$this->text = $text;
		$this->color = $color;
	}

	public function __toString (): string
	{
		return "\e[0;{$this->color}m{$this->text}\e[0m";
	}
}