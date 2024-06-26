# Behat Extension

Set of Behat extensions to make your life easier.

## Exception Extension

This extension provides a way to catch exceptions thrown by Behat and check them in your tests.

### Installation

```bash
composer require --dev yceruto/behat-extension
```

### Configuration

Enable the extension in your `behat.yml`:

```yaml
default:
    extensions:
        Yceruto\BehatExtension\Extension\ExceptionExtension: ~
```

### Usage

Once the extension is enabled, you can use the `(!)` mark in your scenario title to catch 
exceptions thrown by your steps. Then, you can check the exception message using the 
`Then an error should be thrown with message "..."` step:

```gherkin
Feature: Date parsing

  Scenario: Expected error on invalid date (!)
    Given I set an invalid date "0-2024"
    Then an error should be thrown with message "Failed to parse time string (0-2024) at position 0 (0): Unexpected character"
```

> [!NOTE]
> Note that the `(!)` mark is mandatory to catch exceptions. If you don't use it, the exception will be thrown as usual.

To check the exception message in your step definition, you can use the `ExceptionAssertionTrait`. It provides the
`assertExceptionMessage` step to check the exception message. Otherwise, you can use the `ExceptionAssertion` class 
directly if you want to check the exception message in a different way. 

Basic example:

```php
class FeatureContext implements Context
{
    use ExceptionAssertionTrait;

    /**
     * @Given I set an invalid date :date
     */
    public function iSetAnInvalidDate(string $date): void
    {
        new DateTime($date);
    }
}
```

## License

This software is published under the [MIT License](LICENSE)
