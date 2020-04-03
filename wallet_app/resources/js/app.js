/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Including sweet alert
import swal from 'sweetalert2'
window.swal = swal;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navigation-menu', require('./components/Navigation.vue').default);
Vue.component('voucher-list', require('./components/VoucherList.vue').default);
Vue.component('pending-payments', require('./components/PendingPayments.vue').default);
Vue.component('loan-requests', require('./components/LoanRequestList.vue').default);
Vue.component('gift-cards', require('./components/GiftCardLists.vue').default);
Vue.component('dashboard', require('./components/navigation/Dashboard.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// import Vue from 'vue'
import VueRouter from 'vue-router'

import AddMoney from './components/navigation/AddMoney.vue'




Vue.use(VueRouter)
let routes=[

    {path: '/add/money', component: require('./components/navigation/AddMoney').default},
    {path: '/dashboard', component: require('./components/navigation/Dashboard').default},
    {path: '/my/transactions', component: require('./components/navigation/MyTransactions').default },
    {path: '/send/money', component: require('./components/navigation/SendMoney').default },
    {path: '/home', component: require('./components/navigation/Dashboard').default },
    {path: '/generate/voucher', component: require('./components/navigation/GenerateVoucher').default },
    {path: '/redeem/voucher', component: require('./components/navigation/RedeemVoucher').default },
    {path: '/create/gift/card', component: require('./components/navigation/GenerateGiftCard').default },
    {path: '/schedule/payment', component: require('./components/navigation/SchedulePayment').default },
    {path: '/request/loan', component: require('./components/navigation/RequestLoan').default },
    {path: '/approve/loan', component: require('./components/navigation/ApproveLoan').default },

    {path: '/profile/settings', component: require('./components/navigation/Profilesettings').default },

]
const router = new VueRouter({
    mode: 'history',
    routes: routes
});


const app = new Vue({
    el: '#app',
    router
});

let bal = ''
setInterval(function () {
    axios.get('/api/get/current/balance')
        .then(response=>{
            this.bal = response.data;
        });
    $("#currBal").text("Current Balance "+this.bal);
}, 2000);

// $("#app").keydown(function () {
//     axios.get('/api/get/current/balance')
//         .then(response=>{
//             this.bal = response.data;
//         });
//     $("#currBal").text("Current Balance "+this.bal);
// });

