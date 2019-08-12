<template>
    <div>
        <div class="form-group">
            <label for="example-text-input" class="col-form-label">Name</label>
            <input :class="{'has-error':hasError('varName') || hasError('varLink')}" class="form-control" type="text" v-model="category.varName" id="example-text-input">
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" v-model="category.isEnabled" class="custom-control-input" id="isEnabled">
            <label class="custom-control-label" for="isEnabled">{{ category.isEnabled ? 'Active' : 'Not Active' }}</label>
        </div>

        <button class="btn btn-primary mt-1" @click="updateCategory()" type="button">Update Category</button>
    </div>
</template>

<script>
    export default {
        name: "EditCategory",
        props: ['id'],
        data() {
            return {
                category: {
                    intCatID: null,
                    varName: '',
                    isEnabled: false,
                },
                errors: {},
            };
        },
        mounted() {
            this.category.intCatID = this.id;

            this.$http.get(`/admin/categories/find/${this.category.intCatID}`).then(response => {
                this.category = response.data.data.category;
            });
        },
        methods: {
            updateCategory() {
                this.$http.put(`/admin/categories/update/${this.category.intCatID}`, {category: this.category}).then(() => {
                    const options = {
                        title: 'Info',
                        size: 'sm'
                    };

                    this.$dialogs.alert('Saved', options);
                    this.errors = {};
                }, response => {
                    this.errors = response.data.errors;
                });
            },
            hasError(key) {
                return this.errors.hasOwnProperty(key);
            }
        }
    }
</script>
