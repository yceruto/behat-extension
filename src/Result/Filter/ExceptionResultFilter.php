<?php

namespace Yceruto\BehatExtension\Result\Filter;

use Behat\Testwork\Call\CallResult;
use Behat\Testwork\Call\Filter\ResultFilter;
use Yceruto\BehatExtension\Exception\InnerResultException;
use Yceruto\BehatExtension\Model\ExceptionAssertionState;

final class ExceptionResultFilter implements ResultFilter
{
    public function supportsResult(CallResult $result): bool
    {
        return ExceptionAssertionState::$catchErrors && $result->hasException() && !$result->getException() instanceof InnerResultException;
    }

    public function filterResult(CallResult $result): CallResult
    {
        ExceptionAssertionState::$lastError = $result->getException();

        return new CallResult($result->getCall(), $result->getReturn(), null, $result->getStdOut());
    }
}
