<?php
namespace punit\text;
use punit\Text;

class Red
	extends TextWrapper
{
	public function __construct (Text $source)
	{
		parent::__construct(new Joined(
			new DefaultText("\e[0;31m"),
			$source,
			new DefaultText("\e[0m")
		));
	}
}