<?php

class ItemEditPageCest
{
    public function _before(AcceptanceTester $I)
    {
        #refresh the database
        $I->amOnPage('/test/refresh-database');
    }

    // tests
    public function itemsEdit(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/items');
        $I->see('Edit');
        $I->click('Edit');
        $I->see('name');
        $I->see('price');
        $I->fillField('[test=name-input]', 'test');
        $I->fillField('[test=price-input]', '20');
        $I->click('[test=update-button]');

        $I->see('The item test was updated');
    }
}