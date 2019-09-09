<template>
    <div>
        <p><label for="varMainImage">{{ label }}</label></p>
        <div v-if="!imageUrl">
            <input id="varMainImage" type="file" @change="uploadImageParent">
        </div>
        <silentbox-single v-else :src="'/storage/images/' + imageUrl"></silentbox-single>
        <div class="mt-2 text-center">
            <button class="btn btn-flat btn-danger btn-xs" v-if="imageUrl" @click="deleteImageParent">Delete</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImageComponent",
        props: ['label','imageUrl'],
        methods: {
            deleteImageParent() {
                this.$emit('deleteImage');
            },
            uploadImageParent(event) {
                this.$emit('uploadImage', event);
            }
        }
    }
</script>
