<?php
namespace punit\text;
use punit\Text;

class Blue
	extends TextWrapper
{
	public function __construct (Text $source)
	{
		parent::__construct(new Joined(
			new DefaultText("\e[0;34m"),
			$source,
			new DefaultText("\e[0m")
		));
	}
}