# Project 3
+ By: Jackson Uwadiae
+ Production URL: http://e15p3.jacksuwa.online/

## Feature summary 

Project-3 deals with a simple and small items inventory management system. Below are details of the features of the small Item inventory management.
+ Visitor can register/login to view homepage and use the help and support option.
+ User can add/update/soft delete items (item name and item price)
+ Soft deleted items are moved archive
+ User can permanently delete items from archive
+ User can restore soft deleted items from archive
+ User can add/update customers.

  
## Database summary 

The application has 3 total tables (users, items, customers)
+ There's a one-to-many relationship between `customers` and `items`
+ There's a many-to-many relationship between `users` and `items`

## Outside resources
<https://www.w3schools.com/>
<https://laravel.com/api/9.x/Illuminate/Database/Eloquent/SoftDeletes.html>


## Notes for instructor


 ## Tests
 '''
 Codeception PHP Testing Framework v4.2.2 https://helpukrainewin.org
Powered by PHPUnit 8.5.28 #StandWithUkraine

Acceptance Tests (1) -------------------------------------------------------------------------------------------------------------------------------
✔ ItemEditPageCest: Items edit (1.29s)
----------------------------------------------------------------------------------------------------------------------------------------------------


Time: 1.42 seconds, Memory: 18.66 MB

OK (1 test, 4 assertions)
root@hes:/var/www/e15/p3/tests/codeception# codecept run acceptance --fail-fast
Codeception PHP Testing Framework v4.2.2 https://helpukrainewin.org
Powered by PHPUnit 8.5.28 #StandWithUkraine

Acceptance Tests (22) ------------------------------------------------------------------------------------------------------------------------------
✔ CustomerCreatePageCest: Adds a new customer (1.24s)
✔ CustomerCreatePageCest: Shows validation (1.06s)
✔ CustomerEditPageCest: Customer edit (1.17s)
✔ ItemCreatePageCest: Adds a new item (1.25s)
✔ ItemCreatePageCest: Shows validation (1.17s)
✔ ItemEditPageCest: Items edit (1.23s)
✔ ItemIndexPageCest: Shows items (1.13s)
✔ ItemIndexPageCest: Shows new item (1.11s)
✔ ItemListPageCest: Shows empty list (1.04s)
✔ ItemListPageCest: Adds item to list (1.10s)
✔ ItemListPageCest: Removes item from list (1.01s)
✔ ItemListPageCest: Update item on list (1.03s)
✔ ItemShowPageCest: Shows item (1.00s)
✔ ItemShowPageCest: Deletes item (0.96s)
✔ ItemShowPageCest: Item not found (0.89s)
✔ SoftDeleteFeatureCest: Permanently deletes item (0.90s)
✔ UserFeatureCest: User can register (1.14s)
✔ UserFeatureCest: Registration is validated (0.91s)
✔ UserFeatureCest: User can log in (1.11s)
✔ UserFeatureCest: User can logout (0.95s)
✔ UserFeatureCest: Login is validated (0.98s)
✔ UserFeatureCest: Guests cant visit restricted pages (0.92s)
----------------------------------------------------------------------------------------------------------------------------------------------------


Time: 23.56 seconds, Memory: 18.66 MB

OK (22 tests, 33 assertions)
```