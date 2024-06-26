<?php

namespace Yceruto\BehatExtension\Assertion;

use Yceruto\BehatExtension\Exception\InnerResultException;
use Yceruto\BehatExtension\Model\ExceptionAssertionState;

final class ExceptionAssertion
{
    public static function assertExceptionMessage(string $expected): void
    {
        $actual = ExceptionAssertionState::getLastError()->getMessage();

        if ($actual !== $expected) {
            throw new InnerResultException(sprintf('Expected exception with message: %s, got %s', $expected, $actual));
        }
    }
}
