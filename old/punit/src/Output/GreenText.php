<?php
namespace Punit\Output;

class GreenText
	extends ColoredText
{
	public function __construct (Text $text)
	{
		parent::__construct($text, Color::GREEN);
	}
}