require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Layout components

Vue.component('header-main', require('./components/Layout/HeaderMainComponent.vue').default);
Vue.component('footer-main', require('./components/Layout/FooterMainComponent.vue').default);
Vue.component('admin-menu', require('./components/Menus/AdminMenuComponent.vue').default);

// Cards

Vue.component('main-card', require('./components/Cards/MainPageItemElement.vue').default);

// Buttons

Vue.component('default-button', require('./components/Buttons/DefaultButtonComponent.vue').default);

// Pages

Vue.component('main-page', require('./components/Pages/MainPageComponent.vue').default);


const app = new Vue({
    el: '#app',
});
