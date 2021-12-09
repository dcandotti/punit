<?php
namespace punit;

interface Test
{
	public function getName (): Text;
	public function test (TestRunner $runner): void;
}