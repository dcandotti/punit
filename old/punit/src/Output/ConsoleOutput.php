<?php
namespace Punit\Output;

define("PASSED", new GreenText(new DefaultText("PASSED")));
define("FAILED", new RedText(new DefaultText("FAILED")));

class ConsoleOutput
	implements \Punit\Output
{
	private $passed;
	private $failed;

	public function __construct ()
	{
		$this->passed = 0;
		$this->failed = 0;
	}

	public function printName (string $name): void
	{
		echo new CamelCaseToText(new DefaultText($name)) . ": ";
	}

	public function printPassed (): void
	{
		$this->passed++;
		echo PASSED . PHP_EOL;
	}

	public function printFailed (): void
	{
		$this->failed++;
		echo FAILED . PHP_EOL;
	}

	public function printFailedWithMessage (string $message): void
	{
		$this->failed++;
		echo FAILED . PHP_EOL;
		echo "Message: {$message}" . PHP_EOL;
	}

	public function printFailedWithException (\Exception $ex): void
	{
		$this->failed++;
		echo FAILED . PHP_EOL;
		echo "Exception: {$ex->getMessage()}" . PHP_EOL;
		echo $ex->getTraceAsString() . PHP_EOL;
	}

	public function printSummary (): void
	{
		echo PHP_EOL;
		echo "Summary:" . PHP_EOL;
		$total = $this->passed + $this->failed;
		echo "Run {$total} Passed {$this->passed} Failed {$this->failed}" . PHP_EOL;
	}
}