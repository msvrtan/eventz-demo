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

  Scenario: Wanted ticket form is accessible from event page
    Given there are 2 events
    And I am on "Event Number #1" event
    When I click on "I'm looking for a ticket"
    Then I should see "I wanna new ticket for \"Event Number #1\""

  Scenario: Wanted ticket form is accessible from event page
    Given there are 2 events
    And I am on "Event Number #1" event
    When I click on "Gold seat"
    And I click on "I'm looking for a Gold seat ticket"
    Then I should see "I wanna new ticket for \"Event Number #1\""

  Scenario: Wanted ticket form accessed from GoldSeat ticket will have Gold seat as preselected
    Given there are 2 events
    And I am on "Event Number #1" event
    When I click on "Gold seat"
    And I click on "I'm looking for a Gold seat ticket"
    Then "Gold seat" should be selected ticket type

  Scenario: Adding new wanted ticket
    Given there are 2 events
    And I am on "Event Number #1" event
    When I click on "Gold seat"
    And I click on "I'm looking for a Gold seat ticket"
    And I fill "maximumPricePerTicket" with "11"
    And I fill "notificationEmail" with "someone@example.com"
    When I save changes
    Then I should see "We just added your request for a ticket"
