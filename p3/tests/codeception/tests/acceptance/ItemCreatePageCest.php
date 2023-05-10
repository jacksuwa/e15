<?php

class ItemCreatePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    /**
     *Test create item function
     */
    public function addsANewItem(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/items/create');

        $I->fillField('[test=name-input]', 'Test');

        $I->fillField('[test=price-input]', '15');
        $I->click('[test=submit-button]');

        # Assert
        $I->see('Item created successfully ');
    }

    /**
     *
     */
    public function showsValidation(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/items/create');
        $I->click('[test=submit-button]');

        # Assert we see global error feedback
        $I->seeElement('[test=global-error-feedback]');

        # Assert we see at least one field valdiation
        $I->seeElement('[test=error-field-price]');
    }
}