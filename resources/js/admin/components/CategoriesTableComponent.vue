<template>
    <div>
        <table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <draggable v-model="categories" tag="tbody" @end="saveSort">
                <tr v-for="category in categories"  :key="category.intCatID">
                    <th scope="row">{{ category.intCatID }}</th>
                    <td>{{ category.varName }}</td>
                    <td><a :href="category.varLink" target="_blank">{{ category.varLink }}</a></td>
                    <td>{{ category.created_at }}</td>
                    <td>
                        <span :class="{'bg-success':category.isEnabled === 1,'bg-primary':category.isEnabled === 0}" class="status-p">{{ category.isEnabled === 1 ? 'Active' : 'No Active' }}</span>
                    </td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="#" class="text-secondary" @click="edit(category.intCatID)">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-danger" @click="deleteCategory(category.intCatID, category.varName)">
                                    <i class="ti-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </draggable>
        </table>

    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "CategoriesTable",
        components: {
            draggable,
        },
        data() {
            return {
                categories: [],
            };
        },
        mounted() {
            this.$http.get('/admin/categories/list').then(response => {

                this.categories = response.data.data.categories;

            }, () => {
                alert( 'Something went wrong. Send a message in support.');
            });
        },
        methods: {
            saveSort() {
                let sortedCategories = this.categories.map(category => category.intCatID);

                this.$http.post('/admin/categories/save-sort', {categories: sortedCategories});
            },
            deleteCategory(intCatID, varName) {
                const options = {
                    title: 'Confirm?',
                    cancelLabel: 'No'
                };

                this.$dialogs.confirm(`Are you sure you want to delete the "${varName}" category?`, options)
                    .then(res => {
                        if (res.ok === true) {
                            this.$http.delete(`/admin/categories/delete/${intCatID}`).then(() => {
                                let index = this.categories.find(category => {
                                    return category.intCatID === intCatID;
                                });

                                this.categories = this.categories.splice(index, 1);
                            });
                        }
                    })
                ;
            },
            edit(intCatID) {
                window.location.href = `/admin/categories/edit/${intCatID}`;
            }
        }
    }
</script>
