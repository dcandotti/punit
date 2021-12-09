<?php
function thisIsNotATest ()
{
	throw new Exception();
}

function testThisTestShouldPass ()
{
	return true;
}

function testThisTestShouldFail ()
{
	return false;
}

function testThisTestShouldFailWithAMessage ()
{
	return "some error message";
}

function testThisTestShouldFailThrowingAnException ()
{
	throw new Exception("some error message");
}