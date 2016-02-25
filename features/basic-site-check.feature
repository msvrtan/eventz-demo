Feature: Basic site check
	In order to see that site works
	As a user
	I need to check few pages around

  Scenario: Check that homepage works
    Given I am on homepage
    When I click "eventz_demo"
    Then I should be on homepage

  @javascript
  Scenario: Check that homepage works using selenium engine
    Given I am on homepage
    When I click "eventz_demo"
    Then I should be on homepage