<?php

namespace Yceruto\BehatExtension\Context;

use Yceruto\BehatExtension\Assertion\ExceptionAssertion;

trait ExceptionAssertionTrait
{
    /**
     * @Then /^a "([^"]*)" exception should be thrown$/
     */
    public function aClassExceptionShouldBeThrown(string $expected): void
    {
        ExceptionAssertion::assertExceptionClass($expected);
    }

    /**
     * @Then /^a "([^"]*)" exception should be thrown with message "([^"]*)"$/
     */
    public function aClassExceptionShouldBeThrownWithMessage(string $class, string $message): void
    {
        ExceptionAssertion::assertExceptionClass($class);
        ExceptionAssertion::assertExceptionMessage($message);
    }

    /**
     * @Then /^an exception should be thrown with message "([^"]*)"$/
     */
    public function anExceptionShouldBeThrownWithMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessage($expected);
    }

    /**
     * @Then /^an exception should be thrown containing message "([^"]*)"$/
     */
    public function anExceptionShouldBeThrownContainingMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessageContains($expected);
    }
}
