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
* POST .../users/new                             New user
* POST .../users/login/                          Login
* GET .../users/logout/                          Logout
* GET .../users/{user_id}/                       get user for edit
* PATCH .../users/{user_id}/update/              edit a user
* GET .../users/all/stores/                      return all store
* GET .../users/getstore/{store_name}/           return a store by name
* GET .../users/products/{user_id}/              return products by store_id
* GET .../users/deliveries/all/                  return deliveries to the usr logged
* GET ...users/deliveries/store/{store_id}/      return deliveries of a logged user group by store_id


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
