@event @front
Feature: Showing events
  In order to buy or sell tickets
  As a user
  I need to look at supported events

  Scenario: Events are listed on homepage
    Given I am on homepage
    When there are 2 events
    Then I should see list of 2 events

  Scenario: Event page is accessible from homepage
    Given I am on homepage
    And there are 2 events
    When I click on "Event Number #1"
    Then I should see "Event Number #1" on page headline

  Scenario: Event page should show seats tickets
    Given there are 2 events
    When I am on "Event Number #1" event
    Then I should see "Seats"

  Scenario: Event page should show VIP tickets
    Given there are 2 events
    When I am on "Event Number #1" event
    Then I should see "VIP"
