<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { ref, getCurrentInstance } from "vue";
import { inject } from "vue";
import Pagination from "@/Shared/Pagination.vue";
import SearchFilter from "@/Components/category/SearchFilter.vue";
defineProps({ categories: Object, numbers: Number });
const toastr = useToastr();
const form = useForm({
    id: null,
    name: null,
    image: null,
});

const instance = getCurrentInstance();
const imageFile = ref();

const Swal = inject("$swal");
function deleteConfirm(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.post(route("category.delete", id));
            // toastr.success("Category Created.");
            Swal.fire("Deleted!", "Category has been deleted.", "success");
        }
    });
}

const editImageUrl = ref();
function editHandleImageSelected(e) {
    if (!e.target.files.length) return;
    imageFile.value = e.target.files[0];
    console.log(e.target.files[0]);
    let reader = new FileReader();
    reader.readAsDataURL(imageFile.value);
    reader.onload = (e) => {
        editImageUrl.value = e.target.result;
    };
}
function editCategory(data) {
    editForm.name = data.name;
    editForm.id = data.id;
    editImageUrl.value = "../" + data.image;
    instance.refs.editFile.value = null;
}
const editForm = useForm({
    id: null,
    name: null,
    image: null,
});
function updateCategory() {
    editForm.post(route("category.update"));
    editForm.reset();
    $("#editCategoryModal").modal("hide");
    toastr.success("Category Updated.");
}

function changeStatus(id) {
    form.post(route("category.status.update", id));
    toastr.success("Category Status updated.");
}
</script>

<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Category Table ({{ numbers }})</h3>

            <div class="card-tools">
                <SearchFilter />
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="category in categories.data"
                        :key="category.id"
                        v-if="categories.data.length > 0"
                    >
                        <td>
                            <img
                                v-if="category.image"
                                :src="'../' + category.image"
                                width="50"
                                height="50"
                                onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg'"
                            />
                            <p v-else>No Image</p>
                        </td>
                        <td>
                            {{ category.name }}
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        :id="category.name"
                                        :checked="category.status"
                                        @click="changeStatus(category.id)"
                                        required
                                    />

                                    <label
                                        class="custom-control-label"
                                        :for="category.name"
                                    ></label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editCategoryModal"
                                @click="editCategory(category)"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                            &nbsp;
                            <button
                                class="btn btn-sm btn-danger"
                                @click="deleteConfirm(category.id)"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <div v-else>No data</div>
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix" v-if="numbers > 10">
            <Pagination :links="categories.links" />
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="editCategoryModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Edit Category
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form
                        @submit.prevent="updateCategory"
                        enctype="multipart/form-data"
                    >
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input
                                            type="hidden"
                                            v-model="editForm.id"
                                        />
                                        <label for="">Category name</label>
                                        <input
                                            type="text"
                                            v-model="editForm.name"
                                            class="form-control"
                                            placeholder="Add category name"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label>Image</label
                                    ><small class="text-danger"
                                        >* ( Ratio 1:1 )</small
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        @input="
                                            editForm.image =
                                                $event.target.files[0]
                                        "
                                        @change="editHandleImageSelected"
                                        ref="editFile"
                                        accept="image/*"
                                    />
                                </div>
                                <div class="col-12 from_part_2">
                                    <div class="form-group">
                                        <center>
                                            <!-- <ImagePreview /> -->

                                            <img
                                                v-if="editImageUrl"
                                                width="300"
                                                class="mt-2"
                                                height="250"
                                                :src="editImageUrl"
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
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
