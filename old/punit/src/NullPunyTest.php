<?php
namespace Punit;

class NullPunyTest
	implements PunyTest
{
	public function run (Output $output): void {}
}