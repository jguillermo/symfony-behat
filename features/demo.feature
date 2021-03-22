# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
    In order to prove that the Behat Symfony extension is correctly installed
    As a user
    I want to have a demo scenario

    Scenario: Call a not found route
        When I add "Content-Type" header equal to "application/json"
        And I send a "GET" request to "/not-fount-page"
        Then the response status code should be 404

    Scenario: Call a page ok
        And I send a "GET" request to "/ok"
        Then the response status code should be 200
        And the response should be empty

    Scenario: Try to register a user with missing "lastName" field
        When I add "Content-Type" header equal to "application/json"
        And I send a "POST" request to "/register-error" with body:
        """
        {
            "firstName": "jhon"
        }
        """
        Then the response status code should be 400
        And the response should be in JSON
        And the JSON node "message" should be equal to the string "lastName: This value should not be blank."

    Scenario: Successfully register a new user
        When I add "Content-Type" header equal to "application/json"
        And I send a "POST" request to "/register-ok" with body:
        """
        {
            "firstName": "jhon",
            "lastName": "doe"
        }
        """
        Then the response status code should be 201
        And the response should be in JSON
        And the JSON node "id" should not be null
        And the JSON node "name" should be equal to the string "jhon"
        And the JSON node "token" should not be null