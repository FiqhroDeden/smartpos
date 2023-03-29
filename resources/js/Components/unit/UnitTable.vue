<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { inject } from "vue";

defineProps({ units: Object });
const toastr = useToastr();

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
            form.post(route("unit.delete", id));
            Swal.fire("Deleted!", "Unit has been deleted.", "success");
        }
    });
}

function editUnit(data) {
    editForm.name = data.name;
    editForm.id = data.id;
}
const editForm = useForm({
    id: null,
    name: null,
    image: null,
});
function updateUnit() {
    editForm.post(route("unit.update"));
    editForm.reset();
    $("#editModal").modal("hide");
    toastr.success("Unit Updated.");
}
</script>

<template>
    <div class="card">
        <div class="card-header">
            <div class="row container-fluid">
                <div class="col-12 col-sm-4 col-md-6 col-lg-7 col-xl-8">
                    <h5>
                        Unit Type Table
                        <span class="text-danger">({{ units.length }})</span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(unit, index) in units" v-if="units.length > 0">
                        <td>{{ index + 1 }}</td>
                        <td>{{ unit.name }}</td>
                        <td>
                            <button
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editModal"
                                @click="editUnit(unit)"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                            &nbsp;
                            <button
                                class="btn btn-sm btn-danger"
                                @click="deleteConfirm(unit.id)"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <div v-else>No Data</div>
                </tbody>
            </table>
        </div>
    </div>
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
                        Edit Unit
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
                    @submit.prevent="updateUnit"
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
                                    <label for="">Unit name</label>
                                    <input
                                        type="text"
                                        v-model="editForm.name"
                                        class="form-control"
                                        placeholder="Add Brand name"
                                    />
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
