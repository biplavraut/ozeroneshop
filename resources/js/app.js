/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/*Start of Form Validation*/
import { Form, HasError, AlertError } from 'vform'; //form validation
window.Form = Form;

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


/*Start of Progress Bar*/
// Progress bar include
import VueProgressBar from 'vue-progressbar';
/*Define Options for progress bar*/
const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};
/*End of defination*/
/*Call the progress bar*/
Vue.use(VueProgressBar, options)
/*End of Progress Bar*/

/*Sweet alert start*/
import Swal from "sweetalert2";
window.swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
});

Vue.mixin({
    methods:{
        // Check server response and show it
        serverResponse(data){
            if(data.result == 'success'){
                Toast.fire({
                    type: 'success',
                    title: data.message //Success message from server
                })
                this.$Progress.finish();
                Fire.$emit('AfterCreate'); //Fire an reload event

            }else{
                swal.fire(
                    'Error!',
                    data.message, //Error message from server
                    'error'
                )
                this.$Progress.fail(); //End the progress bar
            }
        }
    }

});

window.Toast = Toast;
/*End of sweet alert*/

/*Vue Nestable*/
import Vue from 'vue';
import DashboardPlugin from './argon/plugins/dashboard-plugin';
Vue.use(DashboardPlugin);

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

import PortalVue from 'portal-vue'
Vue.use(PortalVue)

// Vue Nestable
import VueNestable from 'vue-nestable';
Vue.use(VueNestable);

/*Start of Vue Routes*/
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import DashboardLayout from './argon/views/Layout/DashboardLayout.vue';
const routes = [
    {
      path: '/backend/admin',
      redirect: '/backend/admin/dashboard',
      component: DashboardLayout,
      children: [
        {
            path: '/backend/admin/dashboard',
            name: 'dashboard',
          // route level code-splitting
          // this generates a separate chunk (about.[hash].js) for this route
          // which is lazy-loaded when the route is visited.
            component: () => import(/* webpackChunkName: "demo" */ './backend/Dashboard.vue')
        },
        { path: '/backend/admin/profile', name:'profile management', component: require('./backend/Profile.vue').default},
        { path: '/backend/admin/admins', name:'admins management', component: require('./components/Admins.vue').default},

        { path: '/backend/admin/shop-sections', name:'shop sections management', component: require('./components/Shop-sections.vue').default},
        { path: '/backend/admin/brands', name:'brands management', component: require('./components/Brands.vue').default},   
        { path: '/backend/admin/electronics/:shop_section', name:'Categories', component: require('./components/Electronics.vue').default, props:true},

        { path: '/backend/admin/product', name:'product management', component: require('./components/Products.vue').default}, 
        { path: '/backend/admin/product-detail/:slug', name:'Product Detail', component: require('./components/ProductDetail.vue').default, props:true},

        { path: '/backend/admin/slider', name:'slider management', component: require('./components/Slider.vue').default},
        { path: '/backend/admin/blogs', name:'blogs management', component: require('./components/Blogs.vue').default},
        { path: '/backend/admin/partner', name:'partner management', component: require('./components/Partner.vue').default},
        { path: '/backend/admin/faq', name:'faqs management', component: require('./components/Faqs.vue').default},
        { path: '/backend/admin/seo', name:'seo management', component: require('./components/Seo.vue').default},

        { path: '/backend/admin/orders', name:'Orders management', component: require('./components/Orders.vue').default},
        { path: '/backend/admin/customers', name:'Customers management', component: require('./components/Customers.vue').default},

        { path: '/backend/admin/*', name:'page not found', component: require('./components/NotFound.vue').default}
      ]
    }
  ];

const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
    linkActiveClass: 'active'
});


/*This is global filters for Vue JS*/
/*Upper case Filter*/
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

/*Moment JS to format Date*/
import moment from 'moment'; //format date in vue
Vue.filter('myDate', function(created){
    return moment(created).format('Do MMMM  YYYY'); // April 7th 2019,(h:mm:ss a) 3:34:44 pm
});

/*End of date format*/

/*Start of Custom Event Listner Vue - Fires an event after a change*/
let Fire = new Vue();
window.Fire = Fire;

/*End of Custom event listner*/

/*Gate for Vue ACL in frontend*/
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);
/*End of ACL authontication*/

/*Laravel Vue Pagination Starts*/
Vue.component('pagination', require('laravel-vue-pagination'));



/*End of Laravel vue pagination*/

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component(
    'not-found',
    require('./components/NotFound.vue').default
);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data:{
        search:''
    },
    methods:{
        searchit: _.debounce(() =>{
            Fire.$emit('searching');
        },1000)
    }
});
