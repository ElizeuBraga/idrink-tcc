# Projeto Faculdade
* Comando para criar views
* Make:auth

heroku run php artisan migrate --path=database/migrations --app idrink-tcc

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
