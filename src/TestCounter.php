<?php
namespace punit;

class TestCounter
{
	private $total;
	private $passed;
	private $failed;

	public function __construct ()
	{
		$this->total = 0;
		$this->passed = 0;
		$this->failed = 0;
	}

	public function testPassed (): void
	{
		$this->total++;
		$this->passed++;
	}

	public function testFailed (): void
	{
		$this->total++;
		$this->failed++;
	}

	public function totalTests (): int
	{
		return $this->total;
	}

	public function passedTests (): int
	{
		return $this->passed;
	}

	public function failedTests (): int
	{
		return $this->failed;
	}
}