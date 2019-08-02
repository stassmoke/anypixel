<template>
    <div>
        <div class="form-group">
            <label for="varName" class="col-form-label">Name</label>
            <input :class="{'has-error':hasError('varName')}" class="form-control" type="text" v-model="review.varName" id="varName">
        </div>

        <div class="form-group">
            <label for="varPosition" class="col-form-label">Position</label>
            <input :class="{'has-error':hasError('varPosition')}" class="form-control" type="text" v-model="review.varPosition" id="varPosition">
        </div>

        <div class="form-group">
            <label for="varLink" class="col-form-label">Link</label>
            <input :class="{'has-error':hasError('varLink')}" class="form-control" type="url" v-model="review.varLink" id="varLink">
        </div>

        <div class="form-group mt-3">
            <label for="varText" class="col-form-label">Text</label>
            <vue-editor id="varText" v-model="review.varText" useCustomImageHandler @imageAdded="handleImageAdded"></vue-editor>
        </div>

        <div class="custom-control custom-checkbox mt-2">
            <input type="checkbox" v-model="review.isEnabled" class="custom-control-input" id="isEnabled">
            <label class="custom-control-label" for="isEnabled">{{ review.isEnabled ? 'Active' : 'Not Active' }}</label>
        </div>

        <button class="btn btn-primary mt-1" @click="updateReview()" type="button">Update Review</button>
    </div>
</template>

<script>

    import { VueEditor } from "vue2-editor";

    export default {
        components: {
            VueEditor
        },
        props: ['id'],
        data() {
            return {
                review: {
                    intReviewID: null,
                    varName: '',
                    varLink: '',
                    varText: '',
                    varPosition: '',
                    isEnabled: false,
                },
                errors: {},
            };
        },
        mounted() {
            this.review.intReviewID = this.id;

            this.$http.get(`/admin/homepage-reviews/find/${this.review.intReviewID}`).then(response => {
                this.review = response.data.data.review;
            });
        },
        methods: {
            updateReview() {
                this.$http.put(`/admin/homepage-reviews/update/${this.review.intReviewID}`, {review: this.review}).then(() => {
                    const options = {
                        title: 'Info',
                        size: 'sm'
                    };

                    this.$dialogs.alert('Saved', options);
                    this.errors = {};
                }, response => {
                    this.errors = response.data.errors;

                    const options = {
                        title: 'Info',
                        size: 'sm'
                    };

                    let messages = Object.values(this.errors).map(error => error[0]).join(' ');

                    this.$dialogs.alert(messages, options);
                });
            },
            hasError(key) {
                return this.errors.hasOwnProperty(key);
            },
            handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {

                let formData = new FormData();
                formData.append("image", file);

                this.$http.post('/admin/images/upload', formData).then(response => {
                    let url = response.data.data.url;
                    Editor.insertEmbed(cursorLocation, "image", url);
                    resetUploader();
                });
            }
        }
    }
</script>
