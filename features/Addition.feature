Feature: Addition
  In order to add two values together
  As a calculator user
  I need to be able to add two values together

  Scenario:
    Given I have a value "1" and value "2"
    When I use add function
    Then I should get "3"

  Scenario:
    Given I have a value "-1.00000005" and value "8"
    When I use add function
    Then I should get "6.99999995"
