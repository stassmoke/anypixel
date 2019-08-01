window.$ = window.jQuery = require('jquery');

import Vue from 'vue';
import VueResource from 'vue-resource';
import 'v-slim-dialog/dist/v-slim-dialog.css';
import SlimDialog from 'v-slim-dialog';

Vue.use(VueResource);
Vue.use(SlimDialog);

let token = document.head.querySelector('meta[name="csrf-token"]');

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', token.content);
    next();
});

import CategoriesTable from './components/CategoriesTableComponent.vue'
import CreateCategory from './components/CreateCategoryComponent.vue'
import EditCategory from './components/EditCategoryComponent.vue'

new Vue({
    el: '#app',
    components: {
        CategoriesTable,
        CreateCategory,
        EditCategory,
    }
});
