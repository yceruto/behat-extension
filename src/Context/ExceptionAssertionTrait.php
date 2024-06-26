<?php

namespace Yceruto\BehatExtension\Context;

use Yceruto\BehatExtension\Assertion\ExceptionAssertion;

trait ExceptionAssertionTrait
{
    /**
     * @Then /^an error should be thrown with message "([^"]*)"$/
     */
    public function anErrorIsThrownWithMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessage($expected);
    }
}
