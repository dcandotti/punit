<?php
namespace punit\collection;
use Iterator;

abstract class IteratorWrapper
	implements Iterator
{
	private $it;

	public function __construct (Iterator $iterator)
	{
		$this->it = $iterator;
	}

	public function rewind (): void
	{
		$this->it->rewind();
	}

	public function valid (): bool
	{
		return $this->it->valid();
	}

	public function current ()
	{
		return $this->it->current();
	}

	public function key ()
	{
		return $this->it->key();
	}

	public function next (): void
	{
		$this->it->next();
	}
}