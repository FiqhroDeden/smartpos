<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { ref, getCurrentInstance } from "vue";
import { inject } from "vue";
import Pagination from "@/Shared/Pagination.vue";
import SearchFilter from "@/Components/brand/SearchFilter.vue";
defineProps({ brands: Object, numbers: Number });
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
            form.post(route("brand.delete", id));
            Swal.fire("Deleted!", "Brand has been deleted.", "success");
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
function editBrand(data) {
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
function updateBrand() {
    editForm.post(route("brand.update"));
    editForm.reset();
    $("#editModal").modal("hide");
    toastr.success("Brand Updated.");
}
</script>

<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Brand Table ({{ numbers }})</h3>

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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="brand in brands.data"
                        :key="brand.id"
                        v-if="brands.data.length > 0"
                    >
                        <td>
                            <img
                                v-if="brand.image"
                                :src="'../' + brand.image"
                                width="50"
                                height="50"
                                onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg'"
                            />
                            <p v-else>No Image</p>
                        </td>
                        <td>
                            {{ brand.name }}
                        </td>
                        <td>
                            <button
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editModal"
                                @click="editBrand(brand)"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                            &nbsp;
                            <button
                                class="btn btn-sm btn-danger"
                                @click="deleteConfirm(brand.id)"
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
            <Pagination :links="brands.links" />
        </div>
    </div>
    <!-- Modal -->
    <div
        class="modal fade"
        id="editModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Edit Brand
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
                    @submit.prevent="updateBrand"
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
                                    <label for="">Brand name</label>
                                    <input
                                        type="text"
                                        v-model="editForm.name"
                                        class="form-control"
                                        placeholder="Add Brand name"
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
                                        editForm.image = $event.target.files[0]
                                    "
                                    @change="editHandleImageSelected"
                                    ref="editFile"
                                    accept="image/*"
                                />
                            </div>
                            <div class="col-12 from_part_2">
                                <div class="form-group">
                                    <center>
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
</template>
