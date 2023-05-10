<?php

class CustomerEditPageCest
{
    public function _before(AcceptanceTester $I)
    {
        #refresh the database
        $I->amOnPage('/test/refresh-database');
    }

    // tests
    public function customerEdit(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/customers');
        $I->see('Edit');
        $I->click('Edit');
        $I->fillField('[test=first-name-input]', 'test');
        $I->fillField('[test=last-name-input]', 'test');
        $I->click('[test=update-button]');

        $I->see('The customer information has been updated');
    }
}