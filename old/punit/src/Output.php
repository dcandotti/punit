<?php
namespace Punit;

interface Output
{
	public function printName (string $name): void;
	public function printPassed (): void;
	public function printFailed (): void;
	public function printFailedWithMessage (string $message): void;
	public function printFailedWithException (\Exception $ex): void;
	public function printSummary (): void;
}