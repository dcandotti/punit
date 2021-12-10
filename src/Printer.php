<?php
namespace punit;

interface Printer
{
	public function printPassed (Test $test): void;
	public function printFailed (Test $test, string $message = null): void;
	public function printIncomplete (Test $test): void;
	public function printSummary (TestCounter $counter): void;
}