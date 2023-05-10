<?php

class ItemListPageCest
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
    public function showsEmptyList(AcceptanceTester $I)
    {
        # Setup
        $I->amOnPage('/test/login-as/2');

        # Act
        $I->amOnPage('/list');
        $I->seeElement('[test=no-items-message]');
    }

    /**
     *
     */
    public function addsItemToList(AcceptanceTester $I)
    {
        # Setup
        $comments = 'Ut enim ad minim veniam, quis nostrud.';
        $id = 4;

        $I->amOnPage('/test/login-as/2');

        # Act
        $I->amOnPage('/items/' . $id);
        $I->click('[test=add-to-list-button]');
        $I->fillField('[test=comments-textarea]', $comments);
        $I->click('[test=add-to-list-button]');

        # Assert
        $I->see($comments,  '[test=comments-textarea-' . $id . ' ]');
    }

    /**
     *
     */
    public function removesItemFromList(AcceptanceTester $I)
    {
        # Setup
        $id = 1;

        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/items/' . $id);
        $I->see('Edit');
        $I->click('[test=remove-from-list-button-' . $id . ']');

        # Assert
        $I->dontSeeElement('[test=remove-from-list-button-' . $id . ']');
    }

    /**
     *
     */
    public function updateItemOnList(AcceptanceTester $I)
    {
        # Setup
        $id = 1;
        $newComment = 'New test comment please...';

        # Logging in as Jill
        $I->amOnPage('/test/login-as/1');

        # Act
        $I->amOnPage('/list');
        $I->fillField('[test=comments-textarea-' . $id . ']', $newComment);
        $I->click('[test=update-button-' . $id . ']');

        # Assert
        $I->amOnPage('/list');
        $I->see($newComment, '[test=comments-textarea-' . $id . ']');
    }
}