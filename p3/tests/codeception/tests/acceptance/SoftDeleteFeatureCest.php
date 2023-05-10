<?php

class SoftDeleteFeatureCest
{
    public function _before(AcceptanceTester $I)
    {

        $I->amOnPage('/test/refresh-database');
    }

    /**
     *
     */
    public function permanentlyDeletesItem(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/items/archive');

        # Confirm the page exit
        $I->see('Item Name');


        $I->see('Soft Deleted Items');
    }
}