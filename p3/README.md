# Project 3
+ By: Jackson Uwadiae
+ Production URL: <http://e15p3.jacksuwa.online/>

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
```
Codeception PHP Testing Framework v4.2.2 https://helpukrainewin.org
Powered by PHPUnit 8.5.28 #StandWithUkraine

Acceptance Tests (22) ------------------------------------------------------------------------------------------------------------------------------
✔ CustomerCreatePageCest: Adds a new customer (1.21s)
✔ CustomerCreatePageCest: Shows validation (0.98s)
✔ CustomerEditPageCest: Customer edit (1.15s)
✔ ItemCreatePageCest: Adds a new item (1.62s)
✔ ItemCreatePageCest: Shows validation (1.26s)
✔ ItemEditPageCest: Items edit (1.25s)
✔ ItemIndexPageCest: Shows items (1.13s)
✔ ItemIndexPageCest: Shows new item (1.19s)
✔ ItemListPageCest: Shows empty list (0.95s)
✔ ItemListPageCest: Adds item to list (0.96s)
✔ ItemListPageCest: Removes item from list (0.97s)
✔ ItemListPageCest: Update item on list (1.02s)
✔ ItemShowPageCest: Shows item (0.83s)
✔ ItemShowPageCest: Deletes item (0.95s)
✔ ItemShowPageCest: Item not found (0.92s)
✔ SoftDeleteFeatureCest: Permanently deletes item (0.93s)
✔ UserFeatureCest: User can register (0.94s)
✔ UserFeatureCest: Registration is validated (0.87s)
✔ UserFeatureCest: User can log in (1.17s)
✔ UserFeatureCest: User can logout (0.89s)
✔ UserFeatureCest: Login is validated (0.92s)
✔ UserFeatureCest: Guests cant visit restricted pages (0.85s)
----------------------------------------------------------------------------------------------------------------------------------------------------


Time: 23.22 seconds, Memory: 18.66 MB

OK (22 tests, 33 assertions)
```
