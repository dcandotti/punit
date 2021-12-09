<?php
namespace punit;
use Iterator;

class TestRunner
{
	private $tests;
	private $printer;
	private $counter;

	public function __construct (Iterator $tests, Printer $printer)
	{
		$this->tests = $tests;
		$this->printer = $printer;
		$this->counter = new TestCounter();
	}

	public function testPassed (Test $test): void
	{
		$this->counter->testPassed();
		$this->printer->printPassed($test);
	}

	public function testFailed (Test $test, string $message = null): void
	{
		$this->counter->testFailed();
		$this->printer->printFailed($test, $message);
	}

	public function run (): void
	{
		$this->runTests();
		$this->printSummary();
	}

	private function runTests (): void
	{
		foreach ($this->tests as $test)
		{
			$test->test($this);
		}
	}

	private function printSummary (): void
	{
		$this->printer->printSummary($this->counter);
	}
}