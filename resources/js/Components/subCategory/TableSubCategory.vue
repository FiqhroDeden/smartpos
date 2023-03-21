<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { inject } from "vue";
import SearchFilter from "@/Components/subCategory/SearchFilter.vue";
import Pagination from "@/Shared/Pagination.vue";
defineProps({
    subCategories: Object,
    numbers: Number,
    filters: Object,
    categories: Object,
});

const toastr = useToastr();
const editForm = useForm({
    id: null,
    name: null,
    category_id: null,
});
function editModal(data) {
    editForm.name = data.name;
    editForm.id = data.id;
    editForm.category_id = data.category_id;
}
function updateSubCategory() {
    editForm.post(route("category.subCategory.update"));
    editForm.reset();
    $("#editModal").modal("hide");
    toastr.success("Sub Category Updated.");
}

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
            editForm.post(route("category.subCategory.delete", id));
            // toastr.success("Category Created.");
            Swal.fire("Deleted!", "Sub Category has been deleted.", "success");
        }
    });
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

        <div class="table-responsive">
            <table class="table table-hover text-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>Main Category</th>
                        <th>Sub Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="subCategory in subCategories.data"
                        :key="subCategory.id"
                        v-if="subCategories.data.length > 0"
                    >
                        <td></td>
                        <td>{{ subCategory.categories.name }}</td>
                        <td>{{ subCategory.name }}</td>
                        <td>
                            <button
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editModal"
                                @click="editModal(subCategory)"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                            &nbsp;
                            <button
                                class="btn btn-sm btn-danger"
                                @click="deleteConfirm(subCategory.id)"
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
            <Pagination :links="subCategories.links" />
        </div>
    </div>
    <!-- Modal -->
    <div
        class="modal fade"
        id="editModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="Edit Modal"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Edit Sub Category
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
                    @submit.prevent="updateSubCategory"
                    enctype="multipart/form-data"
                >
                    <input type="hidden" v-model="editForm.id" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Sub Category name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        v-model="editForm.name"
                                        class="form-control"
                                        placeholder="Add sub category name"
                                    />
                                    <input
                                        name="position"
                                        value="0"
                                        class="d-none"
                                    />
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
                                        v-model="editForm.category_id"
                                        placeholder="Select Main Category"
                                        required
                                    >
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
</template>
