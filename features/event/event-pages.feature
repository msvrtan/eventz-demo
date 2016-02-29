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

  Scenario: Event page should show 0 available tickets
    Given there are 2 events
    When I am on "Event Number #1" event
    Then I should see "We have 0 available"

  Scenario: Event page should show 4 wanted tickets
    Given there are 2 events
    When I am on "Event Number #1" event
    Then I should see "and 4 wanted tickets"

  Scenario: VIP ticket page should show be accessible from event page
    Given there are 2 events
    And I am on "Event Number #1" event
    When I click on "VIP"
    Then I should see "VIP tickets for Event Number #1"

  Scenario: Premium ticket page should show total number of tickets wanted
    Given there are 2 events
    When I am on "Event Number #1" events "Premium seat" ticket page
    Then I should see "and 3 wanted"
