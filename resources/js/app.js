/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// import Example from './components/ExampleComponent';

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
// Vue.component('example-component', Example);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    data:{
        name: 'Elizeu',
        itemss: [],
        deliveries: del,
        isLoadingD: false,
        isLoadingC: false,
        line: null,
    },

    mounted(){
        // console.log(this.deliveries);
        Echo.channel('user.' + window.Laravel.user)
        .listen('PrivateEvent', (e) => {
            this.deliveries.unshift(e.message)
            console.log(e.message);
        });
    },

    methods:{
        carregaItems: function(id){
            if (this.itemss.length > 0) {
                this.itemss = [];
            }
            for (let i = 0; i < items.length; i++) {
                const element = items[i];
                
                if(items[i].delivery_id == id){
                    this.itemss.push(element);
                }
            }
        },

        delivered(id, val) {
            this.isLoadingD = true
            this.line = id
            setTimeout(() => {
                this.isLoadingD = false
                this.line = null
              },1000)
            return axios.put('deliveries/' + id , {status: val}).then((response) => {
                this.deliveries = response.data[0]
            }).catch( error => { 
                console.log('error: ' + error); 
              });
        },

        canceled(id, val) {
            this.isLoadingC = true
            this.line = id
            setTimeout(() => {
                this.isLoadingC = false
                this.line = null
              },1000)
            return axios.put('deliveries/' + id , {status: val}).then((response) => {
                this.deliveries = response.data[0]
            }).catch( error => { 
                console.log('error: ' + error); 
              });
        },
    }
});
