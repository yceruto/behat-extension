Feature: Exception extension

  Scenario: Expected error class (!)
      Given I throw a logic exception with message "foo"
      Then an exception should be thrown with class "LogicException"
      And an exception should be thrown with message "foo"

  Scenario: Expected error with exact message (!)
    Given I throw an exception with "foo"
    Then an exception should be thrown with message "foo"

  Scenario: Expected error containing partial message (!)
    Given I set an invalid date "0-2024"
    Then an exception should be thrown containing message "Failed to parse time string (0-2024)"

  Scenario: Multiple expected errors (!)
    Given I set an invalid date "31-2024"
    Then an exception should be thrown containing message "Failed to parse time string (31-2024)"
    Given I set an invalid date "100-01-2024"
    Then an exception should be thrown containing message "Failed to parse time string (100-01-2024)"
