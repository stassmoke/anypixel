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

        <button class="btn btn-primary mt-1" @click="createCategory()" type="button">Create Category</button>
    </div>
</template>

<script>

    export default {
        name: "CreateCategory",
        data() {
            return {
                category: {
                    varName: '',
                    isEnabled: false,
                },
                errors: {},
            };
        },
        methods: {
            createCategory() {
                this.$http.post('/admin/categories/store', {category: this.category}).then(response => {
                    window.location.href = response.data.data.link;
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
