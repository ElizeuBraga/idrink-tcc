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

| POST      | api/deliveries                          | deliveries.store                           
| GET|HEAD  | api/deliveries                          | deliveries.index
| GET|HEAD  | api/deliveries/create                   | deliveries.create
| DELETE    | api/deliveries/{delivery}               | deliveries.destroy
| PUT|PATCH | api/deliveries/{delivery}               | deliveries.update                        
| GET|HEAD  | api/deliveries/{delivery}               | deliveries.show
| GET|HEAD  | api/deliveries/{delivery}/edit          | deliveries.edit


| POST      | api/items                               | items.store
| GET|HEAD  | api/items                               | items.index
| GET|HEAD  | api/items/create                        | items.create
| PUT|PATCH | api/items/{item}                        | items.update
| GET|HEAD  | api/items/{item}                        | items.show
| DELETE    | api/items/{item}                        | items.destroy
| GET|HEAD  | api/items/{item}/edit                   | items.edit

| POST      | api/users                      | users.store   //register user
| GET|HEAD  | api/users                      | users.index   // nothing
| POST      | api/users/login                |               // login user
| POST      | api/users/logout               |               // logout user
| PUT|PATCH | api/users/{user}               | users.update  // update user
| DELETE    | api/users/{user}               | users.destroy // nothing
| GET|HEAD  | api/users/{user}               | users.show    // return user logged

| GET|HEAD  | api/stores                     | stores.index  // return all stores of the sistem
| POST      | api/stores                     | stores.store  // nothing
| DELETE    | api/stores/{store}             | stores.destroy// nothing
| PUT|PATCH | api/stores/{store}             | stores.update // nothing
| GET|HEAD  | api/stores/{store}             | stores.show   // return stores by name
| GET|HEAD  | api/stores/{store}/edit        | stores.edit   // nothing
