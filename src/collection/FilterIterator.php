<?php
namespace punit\collection;
use Iterator;

abstract class FilterIterator
	extends IteratorWrapper
{
	public function valid (): bool
	{
		if (!parent::valid()) return false;

		while (!$this->filter($this->current(), $this->key())) {
			$this->next();

			if (!parent::valid()) return false;
		}

		return true;
	}

	protected abstract function filter ($value, $key): bool;
}