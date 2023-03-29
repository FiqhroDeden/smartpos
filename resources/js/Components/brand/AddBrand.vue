<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref, getCurrentInstance } from "vue";
import { useToastr } from "../../toastr.js";

const toastr = useToastr();
const form = useForm({
    id: null,
    name: null,
    image: null,
});
const deleteImage = ref(false);
const instance = getCurrentInstance();
const imageFile = ref();
const imageUrl = ref();
function handleImageSelected(e) {
    if (!e.target.files.length) return;
    imageFile.value = e.target.files[0];
    console.log(e.target.files[0]);
    let reader = new FileReader();
    reader.readAsDataURL(imageFile.value);
    reader.onload = (e) => {
        imageUrl.value = e.target.result;
    };
    deleteImage.value = !deleteImage.value;
}
function submit() {
    form.post("/brand/store", { preserveScroll: true });
    form.reset();
    toastr.success("Brand Created.");
    instance.refs.file.value = null;
    imageFile.value = null;
    imageUrl.value = null;
    deleteImage.value = !deleteImage.value;
}

function resetImage() {
    instance.refs.file.value = null;
    imageFile.value = null;
    imageUrl.value = null;
    deleteImage.value = !deleteImage.value;
}
</script>
<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Brand name</label>
                            <input
                                type="text"
                                v-model="form.name"
                                class="form-control"
                                placeholder="Add Brand name"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Image</label
                        ><small class="text-danger">* ( Ratio 1:1 )</small>
                        <input
                            type="file"
                            class="form-control"
                            @input="form.image = $event.target.files[0]"
                            @change="handleImageSelected"
                            ref="file"
                            accept="image/*"
                        />
                    </div>
                    <div class="col-12 from_part_2">
                        <div class="form-group">
                            <center>
                                <!-- <ImagePreview /> -->
                                <img
                                    v-if="imageUrl"
                                    width="300"
                                    class="mt-2"
                                    height="250"
                                    :src="imageUrl"
                                    alt="Image"
                                />
                                <img
                                    v-else
                                    class="mt-2"
                                    width="300"
                                    height="250"
                                    src="https://6pos.6amtech.com/public/assets/admin/img/400x400/img2.jpg"
                                    alt="Image"
                                />
                                <div>
                                    <p
                                        v-if="deleteImage"
                                        type="button"
                                        style="
                                            color: blue;
                                            text-decoration: underline;
                                        "
                                        @click="resetImage"
                                    >
                                        Reset
                                    </p>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>
