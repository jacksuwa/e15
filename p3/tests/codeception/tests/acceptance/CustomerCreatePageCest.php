<?php

class CustomerCreatePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    // tests
    public function addsANewCustomer(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/customers/create');

        $I->fillField('[test=first-name-input]', 'first');
        $I->fillField('[test=last-name-input]', 'last');
        $I->fillField('[test=address-input]', '30 Derry Rd. E, Milton, Ontario, L9T 2X5, Canada');
        $I->fillField('[test=phone-no-input]', '1 (905) 878-2383');
        $I->click('[test=submit-button]');

        # Assert
        $I->see('Customer created successfully ');
    }

    /**
     *
     */
    public function showsValidation(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/customers/create');
        $I->click('[test=submit-button]');

        # Assert we see global error feedback
        $I->seeElement('[test=global-error-feedback]');

        # Assert we see at least one field valdiation
        $I->seeElement('[test=error-field-last_name]');
    }
}