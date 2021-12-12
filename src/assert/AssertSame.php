<?php
namespace punit\assert;
use punit\Assertion;
use punit\Test;
use punit\TestRunner;

class AssertSame
	implements Assertion
{
	private $expected;
	private $actual;

	public function __construct ($expected, $actual)
	{
		$this->expected = $expected;
		$this->actual = $actual;
	}

	public function assert (TestRunner $runner, Test $test): void
	{
		if ($this->expected === $this->actual) $runner->testPassed($test);
	}
}