# bank
this is a training project on namespace and PHPUnit and so on

This project have Account Class that have:
- constructer that initial balance
- credit method that add credit to balance
- debit method that decrease credit from balance
- getBalance that return the current balance

On another side we have TestUnit for Account class that test:
- Its just working
- At start have well Functionality
- and then we pass a lot of data that test most cases
- at last we have more 100 test with 100 transaction each to (stress test(i dont remember the suit word)) the model

## Installation 
Clone this repo

```sh
git clone git@github.com:qahmad81/bank.git
composer update
```

## implementation
in console write this line at root of project
in linux
```sh
vendor/bin/phpunit src/test --bootstrap src/autoload.php
```
in windows
```sh
vendor\bin\phpunit src/test --bootstrap src/autoload.php
```

you can alsow see index.php on root of project for sure of every things is ok


