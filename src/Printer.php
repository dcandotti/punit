<?php
namespace punit;

interface Printer
{
	public function printPassed (Test $test): void;
	public function printFailed (Test $test): void;
	public function printFailedWithMessage (Test $test, Text $message): void;
	public function printIncomplete (Test $test): void;
	public function printSkipped (Test $test): void;
	public function printSummary (TestCounter $counter): void;
}