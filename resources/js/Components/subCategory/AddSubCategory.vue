<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { useToastr } from "../../toastr.js";
defineProps({ categories: Object });

const toastr = useToastr();
const form = useForm({
    id: null,
    category_id: "",
    name: null,
});
function submit() {
    form.post("/category/sub-category/store", { preserveScroll: true });
    form.reset();
    toastr.success("Sub Category Created.");
}
</script>
<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Sub Category name</label>
                            <input
                                type="text"
                                name="name"
                                v-model="form.name"
                                class="form-control"
                                placeholder="Add sub category name"
                            />
                            <input name="position" value="0" class="d-none" />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Main Category</label>
                            <small class="text-danger">*</small>
                            <select
                                name=""
                                class="form-control"
                                id="subcategory"
                                v-model="form.category_id"
                                placeholder="Select Main Category"
                                required
                            >
                                <option value="" selected>-- Select --</option>
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>
