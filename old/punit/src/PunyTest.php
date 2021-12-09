<?php
namespace Punit;

interface PunyTest
{
	public function run (Output $output): void;
}