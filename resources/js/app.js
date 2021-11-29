import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue' //Importing
import router from './routes'

window.Vue = require('vue').default;

Vue.component('template-app', require('./App.vue').default);

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)


const app = new Vue({
    el: '#app',
    router,
});
