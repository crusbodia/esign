## Set up

 - Copy [.env.example](.env.example) to .env
 - Run `docker-compose up` to set up DB
 - Run `php artisan migrate`
 - Run `php artisan db:seed` to add default user to DB
 - Run `php artisan serve` to run server
 - [Swagger](http://localhost:8000/api/documentation) documentation
 - In case of some Swagger issues there is [Esign.postman_collection.json](Esign.postman_collection.json) file for Postman

### Potential improvements:
 - State pattern for Signature status
 - Add policies for signing document
 - Use custom exceptions
