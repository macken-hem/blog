<template>
<div>
<img v-show="uploadedImage" :src="uploadedImage" class="img_field"/>
<input type="file" name = "image" v-on:change="onFileChange">
</div>
</template>

<script>
export default {
data() {
    return {
    uploadedImage: ''
    };
},
methods: {
    onFileChange(e) {
    let files = e.target.files || e.dataTransfer.files;
    this.createImage(files[0]);
    },
    createImage(file) {
    let reader = new FileReader()
            reader.onload = (e) => {
        this.uploadedImage = e.target.result;
    };
    reader.readAsDataURL(file);
    }
    }
};

</script>

<style scoped>
.img_field{
    width: 100px;
    height: 100px;
}
</style>