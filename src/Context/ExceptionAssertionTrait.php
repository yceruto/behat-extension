<?php

namespace Yceruto\BehatExtension\Context;

use Yceruto\BehatExtension\Assertion\ExceptionAssertion;

trait ExceptionAssertionTrait
{
    /**
     * @Then /^an exception should be thrown with class "([^"]*)"$/
     */
    public function anExceptionIsThrownWithClass(string $expected): void
    {
        ExceptionAssertion::assertExceptionClass($expected);
    }

    /**
     * @Then /^an exception should be thrown with message "([^"]*)"$/
     */
    public function anExceptionIsThrownWithMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessage($expected);
    }

    /**
     * @Then /^an exception should be thrown containing message "([^"]*)"$/
     */
    public function anExceptionIsThrownContainingMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessageContains($expected);
    }
}
