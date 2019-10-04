<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="varName" class="col-form-label">Name</label>
                    <input :class="{'has-error':hasError('varName')}" class="form-control" type="text" v-model="pack.varName" id="varName">
                </div>

                <div class="form-group">
                    <label for="varLink" class="col-form-label">Forwarding link</label>
                    <input :class="{'has-error':hasError('varLink')}" class="form-control" type="text" v-model="pack.varLink" id="varLink">
                </div>

                <div class="form-group">
                    <label for="varDescription" class="col-form-label">Description</label>
                    <input :class="{'has-error':hasError('varDescription')}" class="form-control" type="text" v-model="pack.varDescription" id="varDescription">
                </div>

                <div class="form-group">
                    <label for="intEvantroID" class="col-form-label">Evantro ID</label>
                    <input :class="{'has-error':hasError('intEvantroID')}" class="form-control" type="text" v-model="pack.intEvantroID" id="intEvantroID">
                </div>

                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" v-model="pack.isEnabled" class="custom-control-input" id="isEnabled">
                    <label class="custom-control-label" for="isEnabled">Active: {{ pack.isEnabled ? 'Yes' : 'No' }}</label>
                </div>

                <div class="product-edit-images">
                    <image-component label="Image" :image-url="pack.varImg" @deleteImage="deleteMainImage" @uploadImage="onImageMainChanged"></image-component>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-1" @click="save()" type="button">{{ pack.intPackID === 0 ? 'Create' : 'Update' }} Pack</button>
    </div>
</template>

<script>
    import ImageComponent from "./ImageComponent";

    export default {
        props: {
            id: {
                type: Number,
                required: false,
            }
        },
        components: {
            ImageComponent,
        },
        name: "AfterEffectsCreateEditComponent",
        data() {
            return {
                pack: {
                    intPackID: 0,
                    intEvantroID: null,
                    varImg: null,
                },
                errors: {},
            };
        },
        mounted() {
            if (this.id) {
                this.loadPack();
            }
        },
        methods: {
            loadPack() {
                this.$http.get(`/admin/after-effects-packs/find/${this.id}`).then(response => {
                    this.pack = response.data.data.pack;
                }, () => {
                    alert( 'Something went wrong. Send a message in support.');
                });
            },
            save() {
                this.errors = {};

                if (this.pack.intPackID === 0) {
                    this.store();
                } else {
                    this.update();
                }
            },
            store() {
                this.$http.post('/admin/after-effects-packs/store', this.compactParams()).then(response => {
                    window.location.href = response.data.data.link;
                }, response => this.showErrors(response.data.errors));
            },
            update() {
                this.$http.put(`/admin/after-effects-packs/update/${this.pack.intPackID}`, this.compactParams()).then(() => {
                    this.$dialogs.alert('Updated', {
                        title: 'Info',
                        size: 'sm'
                    });
                }, response => this.showErrors(response.data.errors));
            },
            showErrors(errors) {
                document.body.scrollTop = document.documentElement.scrollTop = 0;
                this.errors = errors;
            },
            hasError(key) {
                return this.errors.hasOwnProperty(key);
            },
            compactParams() {
                return {
                    pack: this.pack,
                };
            },
            deleteMainImage() {
                this.pack.varImg = null;
            },
            onImageMainChanged(event) {
                let file = event.target.files[0];

                const formData = new FormData();
                formData.append('image', file);

                this.$http.post('/admin/images/upload', formData).then(response => {
                    this.pack.varImg = response.data.data.filename;
                });
            }
        }
    }
</script>
