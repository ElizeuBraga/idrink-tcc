/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('all-products', require('./components/AllProducts.vue').default);
Vue.component('active-products', require('./components/ActiveProducts.vue').default);
Vue.component('inactive-products', require('./components/InactiveProducts.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('table-products', {
    template: '<div>'+
              '<table class="table">'+
                    '<thead>'+
                        '<tr>'+
                            '<th>#</th>'+
                            '<th>Nome</th>'+
                            '<th>Valor</th>'+
                            '<th>Status</th>'+
                            '<th>Opções</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        '<tr>'+
                            '<th>1</th>'+
                            '<th>Teste</th>'+
                            '<th>3.00</th>'+
                            '<th>Ativo</th>'+
                            '<th><a href="#" class="btn btn-sm btn-secondary">Excluir</a></th>'+
                        '</tr>'+
                    '</tbody>'+
                '</table>'+
                '<a href="#" class="btn btn-primary" style="margin: 0px 10px 0px 0px">Novo</a>'+
                '<a href="#" class="btn btn-primary" style="margin: 0px 10px 0px 0px">Ativos</a>'+
                '<a href="#" class="btn btn-primary" style="margin: 0px 10px 0px 0px">Inativos</a>'+
                '</div>'
});

const app = new Vue({
    
    el: '#app',
    data:{
        
    }
});
