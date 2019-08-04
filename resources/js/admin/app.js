window.$ = window.jQuery = require('jquery');

import Vue from 'vue';
import VueResource from 'vue-resource';
import SlimDialog from 'v-slim-dialog';
import Paginate from 'vuejs-paginate'
import Multiselect from 'vue-multiselect'
import VueSilentbox from 'vue-silentbox'
import StarRating from 'vue-star-rating'
import { VueEditor } from "vue2-editor";

Vue.use(VueResource);
Vue.use(SlimDialog);
Vue.use(VueSilentbox);

Vue.component('paginate', Paginate);
Vue.component('multiselect', Multiselect);
Vue.component('star-rating', StarRating);
Vue.component('vue-editor', VueEditor);

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
import ProductsTable from './components/ProductsTableComponent.vue'
import ProductItem from './components/ProductItem/ProductItemComponent.vue'

new Vue({
    el: '#app',
    components: {
        CategoriesTable,
        CreateCategory,
        EditCategory,
        HomepageReviewsTable,
        CreateHomepageReview,
        EditHomepageReview,
        ProductsTable,
        ProductItem,
    }
});
