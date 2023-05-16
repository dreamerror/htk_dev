require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Layout components

Vue.component('header-main', require('./components/Layout/HeaderMainComponent.vue').default);
Vue.component('footer-main', require('./components/Layout/FooterMainComponent.vue').default);
Vue.component('admin-menu', require('./components/Menus/AdminMenuComponent.vue').default);

// Cards

Vue.component('main-card', require('./components/Cards/MainPageItemElement.vue').default);

// Lists

Vue.component('main-card-list', require('./components/Lists/MainCardsListComponent.vue').default);
Vue.component('admin-card-list', require('./components/Lists/AdminCardsListComponent.vue').default);

// Buttons

Vue.component('default-button', require('./components/Buttons/DefaultButtonComponent.vue').default);
Vue.component('download-button', require('./components/Buttons/DownloadButtonComponent.vue').default);

// Pages

Vue.component('main-page', require('./components/Pages/MainPageComponent.vue').default);
Vue.component('temp-storage-page', require('./components/Pages/SVHPageComponent.vue').default);


const app = new Vue({
    el: '#app',
});
