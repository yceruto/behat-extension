<?php

namespace Yceruto\BehatExtension\Assertion;

use Yceruto\BehatExtension\Exception\InnerResultException;
use Yceruto\BehatExtension\Model\ExceptionAssertionState;

final class ExceptionAssertion
{
    public static function assertExceptionMessage(string $expected): void
    {
        $actual = ExceptionAssertionState::getLastError()->getMessage();

        $expected = str_replace('\\"', '"', $expected);

        if ($actual !== $expected) {
            throw new InnerResultException(sprintf('Expected exception with message: %s, but got %s', $expected, $actual));
        }
    }

    public static function assertExceptionMessageContains(string $expected): void
    {
        $actual = ExceptionAssertionState::getLastError()->getMessage();

        $expected = str_replace('\\"', '"', $expected);

        if (!str_contains($actual, $expected)) {
            throw new InnerResultException(sprintf('Expected exception message to contain: %s, but got %s', $expected, $actual));
        }
    }

    public static function assertExceptionMessageMatchesPattern(string $pattern): void
    {
        $actual = ExceptionAssertionState::getLastError()->getMessage();

        if (!preg_match($pattern, $actual)) {
            throw new InnerResultException(sprintf('Expected exception message to match pattern: "%s", got %s', $pattern, $actual));
        }
    }

    public static function assertExceptionClass(string $expected): void
    {
        $actual = ExceptionAssertionState::getLastError()::class;

        if (!str_contains($actual, $expected)) {
            throw new InnerResultException(sprintf('Expected exception class: %s, but got %s', $expected, $actual));
        }
    }
}
