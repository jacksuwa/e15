<?php

class ItemIndexPageCest
{



    //to do 
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    public function showsItems(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/items');

        //modify this
        $I->click('[test=item-link]');
        $I->see('1');
    }

    public function showsNewItem(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/items');

        # Assert there are 5 items in the  result
        $resultCount = count($I->grabMultiple('[test=item-link]'));
        $I->assertEquals(5, $resultCount);
    }
}