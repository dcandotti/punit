<?php
namespace punit\collection;
use Iterator;

abstract class MapIterator
	extends IteratorWrapper
{
	public function current ()
	{
		return $this->map(parent::current());
	}

	protected abstract function map ($value);
}