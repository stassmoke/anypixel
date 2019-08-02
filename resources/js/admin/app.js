window.$ = window.jQuery = require('jquery');

import Vue from 'vue';
import VueResource from 'vue-resource';
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
import HomepageReviewsTable from './components/HomepageReviewsTableComponent.vue'
import CreateHomepageReview from './components/CreateHomepageReviewComponent.vue'
import EditHomepageReview from './components/EditHomepageReviewComponent.vue'

new Vue({
    el: '#app',
    components: {
        CategoriesTable,
        CreateCategory,
        EditCategory,
        HomepageReviewsTable,
        CreateHomepageReview,
        EditHomepageReview
    }
});
