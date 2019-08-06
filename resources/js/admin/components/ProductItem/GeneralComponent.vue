<template>
    <div>
        <div class="form-group">
            <label for="varName" class="col-form-label">Name</label>
            <input :class="{'has-error':hasError('varName')}" class="form-control" type="text" v-model="product.varName" id="varName">
        </div>

        <div class="form-group">
            <label for="varSubtitle" class="col-form-label">Subtitle</label>
            <input :class="{'has-error':hasError('varSubtitle')}" class="form-control" type="text" v-model="product.varSubtitle" id="varSubtitle">
        </div>

        <div class="form-group">
            <label for="intCatID" class="col-form-label">Category</label>
            <multiselect :class="{'has-error':hasError('intCatID')}" id="intCatID" @input="$emit('setParams','intCatID', selectedCategory.intCatID)" v-model="selectedCategory" track-by="intCatID" label="varName" placeholder="Select category" :options="categories" :searchable="true">
                <template slot="singleLabel" slot-scope="{ option }">{{ option.varName }}</template>
            </multiselect>
        </div>
        <div class="form-group">
            <label for="varLink" class="col-form-label">Forwarding link</label>
            <input :class="{'has-error':hasError('varLink')}" class="form-control" type="text" v-model="product.varLink" id="varLink">
        </div>

        <div class="form-group">
            <label for="varPrice" class="col-form-label">Price</label>
            <input :class="{'has-error':hasError('varPrice')}" class="form-control" type="number" v-model="product.varPrice" id="varPrice">
        </div>

        <div class="form-group">
            <label for="varYoutubeCode" class="col-form-label">Youtube code</label>
            <input :class="{'has-error':hasError('varYoutubeCode')}" class="form-control" type="text" placeholder="Example: GtlCa6xZYPY" v-model="product.varYoutubeCode" id="varYoutubeCode">
        </div>

        <div class="form-group mt-3">
            <label for="varText" class="col-form-label">Description</label>
            <vue-editor :class="{'has-error':hasError('varDescription')}" id="varText" v-model="product.varDescription" useCustomImageHandler @imageAdded="handleImageAdded"></vue-editor>
        </div>

        <div class="form-group">
            <label for="intRating" class="col-form-label">Rating</label>
            <star-rating id="intRating" class="product-reviews-stars" :show-rating="false" v-model="product.intRating"></star-rating>
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
    import ImageComponent from "./ImageComponent";

    export default {
        components: {
            ImageComponent,
        },
        name: "General",
        props: ['product','errors'],
        data() {
            return {
                categories: [],
                selectedCategory: null,
            }
        },
        mounted() {
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
                    this.$emit('setParams','varMainImage',response.data.data.filename);
                });

            },
            onImageThumbnailChanged(event) {
                let file = event.target.files[0];

                const formData = new FormData();
                formData.append('image', file);

                this.uploadImage(formData, response => {
                    this.$emit('setParams','varThumbnailImage',response.data.data.filename);
                });

            },
            uploadImage(formData, callback) {
                this.$http.post('/admin/images/upload', formData).then(callback);
            },
            deleteMainImage() {
                this.$emit('setParams','varMainImage', null);
            },
            deleteThumbnail() {
                this.$emit('setParams','varThumbnailImage', null);
            }
        }
    }
</script>
