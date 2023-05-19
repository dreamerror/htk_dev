require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Layout components

Vue.component('header-main', require('./components/Layout/HeaderMainComponent.vue').default);
Vue.component('header-only-main', require('./components/Layout/HeaderOnlyMainComponent.vue').default);
Vue.component('footer-main', require('./components/Layout/FooterMainComponent.vue').default);
Vue.component('admin-menu', require('./components/Menus/AdminMenuComponent.vue').default);

// Cards

Vue.component('main-card', require('./components/Cards/MainPageItemElement.vue').default);
Vue.component('contacts-card', require('./components/Cards/ContactsItemElement.vue').default);
Vue.component('price-card', require('./components/Cards/PricesItemElement.vue').default);

// Lists

Vue.component('main-card-list', require('./components/Lists/MainCardsListComponent.vue').default);
Vue.component('admin-card-list', require('./components/Lists/AdminCardsListComponent.vue').default);

// Buttons

Vue.component('default-button', require('./components/Buttons/DefaultButtonComponent.vue').default);
Vue.component('download-button', require('./components/Buttons/DownloadButtonComponent.vue').default);

// Pages

Vue.component('main-page', require('./components/Pages/MainPageComponent.vue').default);
Vue.component('temp-storage-page', require('./components/Pages/SVHPageComponent.vue').default);
Vue.component('customs-page', require('./components/Pages/TPPageComponent.vue').default);
Vue.component('cargo-trans-page', require('./components/Pages/CargoTransPageComponent.vue').default);
Vue.component('pass-trans-page', require('./components/Pages/PassTransPageComponent.vue').default);
Vue.component('transit-trans-page', require('./components/Pages/TransitTransPageComponent.vue').default);
Vue.component('contacts-page', require('./components/Pages/ContactsPageComponent.vue').default);
Vue.component('prices-page', require('./components/Pages/PricesPageComponent.vue').default);


const app = new Vue({
    el: '#app',
});
