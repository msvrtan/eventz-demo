@event @front @javascript
Feature: Showing events
	In order to buy or sell tickets
	As a user
	I need to look at supported events

  Scenario: Events are listed on homepage
    Given I am on homepage
    When there are 2 events
    Then I should see list of 2 events
