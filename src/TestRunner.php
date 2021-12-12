<?php
namespace punit;

interface TestRunner
{
	public function testPassed (Test $test): void;
	public function testFailed (Test $test): void;
	public function testFailedWithMessage (Test $test, Text $message): void;
	public function testIncomplete (Test $test): void;
	public function run (): void;
}