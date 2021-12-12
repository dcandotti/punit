<?php
namespace punit;
use Iterator;

class DefaultTestRunner
	implements TestRunner
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

	public function testFailed (Test $test): void
	{
		$this->counter->testFailed();
		$this->printer->printFailed($test);
	}

	public function testFailedWithMessage (Test $test, Text $message): void
	{
		$this->counter->testFailed();
		$this->printer->printFailedWithMessage($test, $message);
	}

	public function testIncomplete (Test $test): void
	{
		$this->counter->testIncomplete();
		$this->printer->printIncomplete($test);
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