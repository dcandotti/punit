<?php
namespace Punit\Output;

class RedText
	extends ColoredText
{
	public function __construct (Text $text)
	{
		parent::__construct($text, Color::RED);
	}
}