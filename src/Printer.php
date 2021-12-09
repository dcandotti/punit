<?php
namespace punit;

interface Printer
{
	public function printPassed (Test $test): void;
	public function printFailed (Test $test): void;
	public function printSummary (TestCounter $counter): void;
}