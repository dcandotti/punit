<?php
namespace punit;

class TestCounter
{
	private $total;
	private $passed;
	private $failed;
	private $incomplete;
	private $skipped;

	public function __construct ()
	{
		$this->total = 0;
		$this->passed = 0;
		$this->failed = 0;
		$this->incomplete = 0;
		$this->skipped = 0;
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

	public function testIncomplete (): void
	{
		$this->total++;
		$this->incomplete++;
	}

	public function testSkipped (): void
	{
		$this->total++;
		$this->skipped++;
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

	public function incompleteTests (): int
	{
		return $this->incomplete;
	}

	public function skippedTests (): int
	{
		return $this->skipped;
	}
}