<template>
    <div>
        <table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Slug</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tr v-for="product in products">
                <th scope="row">{{ product.intProductID }}</th>
                <td>{{ product.varName }}</td>
                <td><a :href="product.varLink" target="_blank">{{ product.varLink }}</a></td>
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
                            <a href="#" class="text-danger" @click="deleteReview(product.intProductID, product.varName)">
                                <i class="ti-trash"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>

        </table>

        <paginate
            v-model="pagination.page"
            :page-count="pagination.count"
            :page-range="3"
            :margin-pages="2"
            :click-handler="onPageChange"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination'"
            :page-class="'page-item'">
        </paginate>

    </div>
</template>

<script>

    export default {

        data() {
            return {
                products: [],
                pagination: {
                    page: 1,
                    count: 1,
                },
            };
        },
        mounted() {
            this.$http.get('/admin/products/list').then(response => {

                this.products = response.data.data.products;

            }, () => {
                alert('Something went wrong. Send a message in support.');
            });
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

                                this.products = this.products.splice(index, 1);
                            });
                        }
                    })
                ;
            },
            edit(intProductID) {
                window.location.href = `/admin/products/edit/${intProductID}`;
            },
            onPageChange(pageNum) {
                console.log(pageNum);
            }
        }
    }
</script>
