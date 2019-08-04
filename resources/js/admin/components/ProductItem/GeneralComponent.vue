<template>
    <div>
        <div class="form-group">
            <label for="varName" class="col-form-label">Name</label>
            <input class="form-control" type="text" v-model="product.varName" id="varName">
        </div>

        <div class="form-group">
            <label for="varSubtitle" class="col-form-label">Subtitle</label>
            <input class="form-control" type="text" v-model="product.varSubtitle" id="varSubtitle">
        </div>

        <div class="form-group">
            <label for="intCatID" class="col-form-label">Category</label>
            <multiselect id="intCatID" v-model="product.intCatID" track-by="varName" label="varName" placeholder="Select category" :options="categories" :searchable="true">
                <template slot="singleLabel" slot-scope="{ option }">{{ option.varName }}</template>
            </multiselect>
        </div>
        <div class="form-group">
            <label for="varLink" class="col-form-label">Forwarding link</label>
            <input class="form-control" type="text" v-model="product.varLink" id="varLink">
        </div>

        <div class="form-group">
            <label for="varPrice" class="col-form-label">Price</label>
            <input class="form-control" type="number" v-model="product.varPrice" id="varPrice">
        </div>

        <div class="form-group">
            <label for="varYoutubeCode" class="col-form-label">Youtube code</label>
            <input class="form-control" type="text" placeholder="Example: GtlCa6xZYPY" v-model="product.varYoutubeCode" id="varYoutubeCode">
        </div>

        <div class="form-group mt-3">
            <label for="varText" class="col-form-label">Description</label>
            <vue-editor id="varText" v-model="product.varDescription" useCustomImageHandler @imageAdded="handleImageAdded"></vue-editor>
        </div>

        <div class="custom-control custom-checkbox mt-2">
            <input type="checkbox" v-model="product.isEnabled" class="custom-control-input" id="isEnabled">
            <label class="custom-control-label" for="isEnabled">Active: {{ product.isEnabled ? 'Yes' : 'No' }}</label>
        </div>

        <div class="custom-control custom-checkbox mt-2">
            <input type="checkbox" v-model="product.isNew" class="custom-control-input" id="isNew">
            <label class="custom-control-label" for="isNew">New: {{ product.isNew ? 'Yes' : 'No' }}</label>
        </div>

        <div class="custom-control custom-checkbox mt-2">
            <input type="checkbox" v-model="product.isCheapest" class="custom-control-input" id="isCheapest">
            <label class="custom-control-label" for="isCheapest">Cheapest: {{ product.isCheapest ? 'Yes' : 'No' }}</label>
        </div>

        <div class="custom-control custom-checkbox mt-2">
            <input type="checkbox" v-model="product.isBestSelling" class="custom-control-input" id="isBestSelling">
            <label class="custom-control-label" for="isBestSelling">BestSelling: {{ product.isBestSelling ? 'Yes' : 'No' }}</label>
        </div>

        <div class="product-edit-images">
            <image-component :label="'Main Image'" :image-url="product.varMainImage" @deleteImage="deleteMainImage" @uploadImage="onImageMainChanged"></image-component>
            <image-component :label="'Thumbnail Image'" :image-url="product.varThumbnailImage" @deleteImage="deleteThumbnail" @uploadImage="onImageThumbnailChanged"></image-component>
        </div>

    </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    import ImageComponent from "./ImageComponent";

    export default {
        components: {
            ImageComponent,
            VueEditor,
        },
        name: "General",
        props: ['product_item','errors'],
        data() {
            return {
                categories: [],
                product: {},
            }
        },
        created() {
            this.product = this.product_item;
            this.$http.get('/admin/categories/options').then(response => {
                this.categories = response.data.data.categories;
            }, () => {
                alert( 'Something went wrong. Send a message in support.');
            });
        },
        methods: {
            hasError(key) {
                return this.errors.hasOwnProperty(key);
            },
            handleImageAdded: function(file, Editor, cursorLocation, resetUploader) {

                let formData = new FormData();
                formData.append('image', file);

                this.uploadImage(formData, response => {
                    let url = response.data.data.url;
                    Editor.insertEmbed(cursorLocation, 'image', url);
                    resetUploader();
                });
            },
            onImageMainChanged(event) {
                let file = event.target.files[0];

                const formData = new FormData();
                formData.append('image', file);

                this.uploadImage(formData, response => {
                    this.product.varMainImage = response.data.data.filename;
                });

            },
            onImageThumbnailChanged(event) {
                let file = event.target.files[0];

                const formData = new FormData();
                formData.append('image', file);

                this.uploadImage(formData, response => {
                    this.product.varThumbnailImage = response.data.data.filename;
                });

            },
            uploadImage(formData, callback) {
                this.$http.post('/admin/images/upload', formData).then(callback);
            },
            deleteMainImage() {
                this.product.varMainImage = null;
            },
            deleteThumbnail() {
                this.product.varThumbnailImage = null;
            }
        }
    }
</script>
