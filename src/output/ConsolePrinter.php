<?php
namespace punit\output;
use punit\Printer;
use punit\Test;
use punit\Text;
use punit\text\DefaultText;
use punit\text\Green;
use punit\text\Red;
use punit\text\Blue;
use punit\text\Joined;
use punit\text\EndOfLine;
use punit\TestCounter;

class ConsolePrinter
	implements Printer
{
	public function printPassed (Test $test): void
	{
		$this->println(new Joined(
			$test->getName(),
			new DefaultText(": "),
			new Green(new DefaultText("PASSED"))
		));
	}

	public function printFailed (Test $test, string $message = null): void
	{
		$this->println(new Joined(
			$test->getName(),
			new DefaultText(": "),
			new Red(new DefaultText("FAILED"))
		));
		if ($message) $this->println(new DefaultText($message));
	}

	public function printIncomplete (Test $test): void
	{
		$this->println(new Joined(
			$test->getName(),
			new DefaultText(": "),
			new DefaultText("INCOMPLETE")
		));
	}

	public function printSummary (TestCounter $counter): void
	{
		$this->print(new DefaultText(PHP_EOL));

		$summary = new Joined(
			new DefaultText("Total: {$counter->totalTests()}, "),
			new Green(new DefaultText("Passed")),
			new DefaultText(": {$counter->passedTests()}"),
		);

		if ($counter->passedTests() > 0) {
			$summary = new Joined(
				$summary,
				new DefaultText(", "),
				new Red(new DefaultText("Failed")),
				new DefaultText(": {$counter->failedTests()}"),
			);
		}

		if ($counter->incompleteTests() > 0) {
			$summary = new Joined(
				$summary,
				new DefaultText(", "),
				new Blue(new DefaultText("Incomplete")),
				new DefaultText(": {$counter->incompleteTests()}"),
			);
		}

		$this->print($summary);
	}

	private function println (Text $text): void
	{
		$this->print(new EndOfLine($text));
	}

	private function print (Text $text): void
	{
		echo $text;
	}
}