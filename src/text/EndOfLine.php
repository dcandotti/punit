<?php
namespace punit\text;
use punit\Text;

class EndOfLine
	extends TextWrapper
{
	public function __construct (Text $source)
	{
		parent::__construct(new Joined(
			$source,
			new DefaultText(PHP_EOL)
		));
	}
}