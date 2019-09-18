# Projeto Faculdade
* Comando para criar views
* Make:auth

heroku run php artisan migrate --path=database/migrations --app idrink-tcc

imagens gratis
https://unsplash.com/photos/UErWoQEoMrc

# Rotas Api
* POST .../new  New user

* POST .../users/login  Login
* GET .../users/logout  Logout

* GET .../users/{user_id} get user for edit
* PATCH .../{user_id}/update edit a user
* GET .../all/stores return all store
* GET .../getstore/{store_name} return a store by name
* GET .../products/{user_id} return products by store_id
* GET .../deliveries/all return deliveries to the usr logged

* GET .../all Return all deliveries of a logged user
* GET .../store/{store_id}return deliveries of a logged user group by store_id
