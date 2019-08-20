<template>
    <div>
        <table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Subtitle</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Link</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tr v-for="product in products">
                <th scope="row">{{ product.intProductID }}</th>
                <td>{{ product.varName }}</td>
                <td>{{ product.varSubtitle }}</td>
                <td>
                    <a :href="'/admin/categories/edit/' + product.category.intCatID" target="_blank">{{ product.category.varName }}</a>
                </td>
                <td>
                    <div v-if="product.varThumbnailImage !== null" class="product-list-image-block">
                        <img :src="imagePrefix + product.varThumbnailImage" :alt="product.varName">
                    </div>
                </td>
                <td><a :href="product.varLink" target="_blank">Open</a></td>
                <td>{{ product.varSlug }}</td>
                <td>
                    <span :class="{'bg-success':product.isEnabled === 1,'bg-primary':product.isEnabled === 0}" class="status-p">{{ product.isEnabled === 1 ? 'Active' : 'No Active' }}</span>
                </td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li class="mr-3">
                            <a href="#" class="text-secondary" @click="edit(product.intProductID)">
                                <i class="fa fa-edit"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-danger" @click="deleteProduct(product.intProductID, product.varName)">
                                <i class="ti-trash"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>

        </table>

        <div class="mt-3" v-if="pagination.count > 1">
            <paginate
                v-model="pagination.currentPage"
                :page-count="pagination.count"
                :page-range="16"
                :margin-pages="8"
                :click-handler="loadProducts"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination pg-color-border'"
                :page-class="'page-item'"
                :page-link-class="'page-link'"
                :prev-class="'page-item'"
                :prev-link-class="'page-link'"
                :next-class="'page-item'"
                :next-link-class="'page-link'"
            >
            </paginate>
        </div>

    </div>
</template>

<script>

    export default {

        data() {
            return {
                products: [],
                pagination: {
                    currentPage: 1,
                    count: 0,
                },
                imagePrefix: '',
            };
        },
        mounted() {
           this.loadSubscribers();
        },
        methods: {

            deleteReview(intProductID, varName) {
                const options = {
                    title: 'Confirm?',
                    cancelLabel: 'No'
                };

                this.$dialogs.confirm(`Are you sure you want to delete the "${varName}" product?`, options)
                    .then(res => {
                        if (res.ok === true) {
                            this.$http.delete(`/admin/products/delete/${intProductID}`).then(() => {
                                let index = this.products.find(product => {
                                    return product.intProductID === intProductID;
                                });

                                this.products.splice(index, 1);
                            });
                        }
                    })
                ;
            },
            edit(intProductID) {
                window.location.href = `/admin/products/edit/${intProductID}`;
            },
            loadSubscribers() {
                let params = {
                    page: this.pagination.currentPage,
                };

                this.$http.get('/admin/products/list', {params: params}).then(response => {

                    this.products = response.data.data.products;
                    this.pagination = response.data.data.pagination;
                    this.imagePrefix = response.data.data.imagePrefix;

                }, () => {
                    alert('Something went wrong. Send a message in support.');
                });
            }
        }
    }
</script>
