# Projeto Faculdade
* Comando para criar views
* Make:auth

heroku run php artisan migrate --path=database/migrations --app idrink-tcc
php artisan clear-compiled
chmod -R 777 storage
php artisan passport:keys
heroku run bash

imagens gratis
https://unsplash.com/photos/UErWoQEoMrc

# Rotas Api

| POST      | api/deliveries                          | deliveries.store    //store a delivery in the database
| GET|HEAD  | api/deliveries                          | deliveries.index    //return all deliveries to the logged user
| DELETE    | api/deliveries/{delivery}               | deliveries.destroy  
| PUT|PATCH | api/deliveries/{delivery}               | deliveries.update   //update a delivery
| GET|HEAD  | api/deliveries/{delivery}               | deliveries.show     //get a delivery by id


| POST      | api/items                               | items.store         //store a item in the database
| GET|HEAD  | api/items                               | items.index         //return all items of a logged user
| PUT|PATCH | api/items/{item}                        | items.update        //update item
| GET|HEAD  | api/items/{item}                        | items.show          // return item by id
| DELETE    | api/items/{item}                        | items.destroy       //nothing
      
| POST      | api/users                               | users.store         //register user
| GET|HEAD  | api/users                               | users.index         // nothing
| POST      | api/users/login                         |                     // login user
| POST      | api/users/logout                        |                     // logout user
| PUT|PATCH | api/users/{user}                        | users.update        // update user
| DELETE    | api/users/{user}                        | users.destroy       // nothing
| GET|HEAD  | api/users/{user}                        | users.show          // return user logged

| GET|HEAD  | api/stores/products/{store_id}          |                     // return products by store_id
| GET|HEAD  | api/stores                              | stores.index        // return all stores of the sistem
| POST      | api/stores                              | stores.store        // nothing
| DELETE    | api/stores/{store}                      | stores.destroy      // nothing
| PUT|PATCH | api/stores/{store}                      | stores.update       // nothing
| GET|HEAD  | api/stores/{store}                      | stores.show         // return stores by name
| GET|HEAD  | api/stores/{store}/edit                 | stores.edit         // nothing

| GET|HEAD  | api/adresses                            | adresses.index      //get adresses of a logged user
| POST      | api/adresses                            | adresses.store      //store a address in the database
| PUT|PATCH | api/adresses/{adress}                   | adresses.update     //update a address
| DELETE    | api/adresses/{adress}                   | adresses.destroy    //nothing
| GET|HEAD  | api/adresses/{adress}                   | adresses.show       //nothing


