Feature: Exception extension

  Scenario: Expected error class (!)
      Given I throw a logic exception with message "foo"
      Then a "LogicException" exception should be thrown with message "foo"

  Scenario: Expected error with exact message (!)
    Given I throw an exception with "foo"
    Then an exception should be thrown with message "foo"

  Scenario: Expected error containing partial message (!)
    Given I set an invalid date "0-2024"
    Then an exception should be thrown containing message "Failed to parse time string (0-2024)"

  Scenario: Expected error class with partial message (!)
    Given I throw an exception with "message containing \"foo\""
    Then an "Exception" exception should be thrown containing message "containing \"foo\""

  Scenario: Expected error containing pattern (!)
    Given I set an invalid date "0-2024"
    Then an exception should be thrown matching pattern "/(.*)2024/"
    Then a "Exception" exception should be thrown matching pattern "/(.*)2024/"

  Scenario: Multiple expected errors (!)
    Given I set an invalid date "31-2024"
    Then an exception should be thrown containing message "Failed to parse time string (31-2024)"
    Given I set an invalid date "100-01-2024"
    Then an exception should be thrown containing message "Failed to parse time string (100-01-2024)"

  Scenario: Accepts double quote escaping (!)
    Given I throw an exception with "this is a \"quoted\" message"
    Then an exception should be thrown with message "this is a \"quoted\" message"
