<?php

class ItemShowPageCest
{
    /**
     *
     */
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');
    }

    /**
     *
     */
    public function showsItem(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');

        $I->amOnPage('/items/1');
        $I->see('1');
    }

    /**
     *
     */
    public function deletesItem(AcceptanceTester $I)
    {
        # Setup
        $id = 2;
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/items/' . $id);

        # Act

        $I->click('[test=delete-button]');
        $I->click('[test=confirm-delete-button]');

        # Assert//recheck
        $I->dontSeeElement('[test=item-link-' . $id . ']');
    }

    /**
     * Test if an invalid id item is not found
     */
    public function ItemNotFound(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/items/invalidId-1');

        # Assert
        $I->see('Item is not found');
        $I->seeElement('[test=all-items-heading]');
    }
}