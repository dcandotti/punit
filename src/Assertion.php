<?php
namespace punit;

interface Assertion
{
	public function assert (TestRunner $runner, Test $test): void;
}