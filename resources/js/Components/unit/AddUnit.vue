<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToastr } from "../../toastr.js";

const toastr = useToastr();
const form = useForm({
    id: null,
    name: null,
});

function submit() {
    form.post("/unit/store", { preserveScroll: true });
    form.reset();
    toastr.success("Unit Created.");
}
</script>

<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <input
                    type="hidden"
                    name="_token"
                    value="6ygODdB6JbOb9ADW7Y8V6KxAynhVeLQVmC3DALxc"
                />
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Unit</label>
                            <input
                                type="text"
                                name="name"
                                v-model="form.name"
                                class="form-control"
                                placeholder="Unit"
                            />
                            <input name="position" value="0" class="d-none" />
                        </div>
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>
