<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import MainLayout from "@/Layouts/MainLayout.vue";

const toastr = useToastr();
const form = useForm({
    import_file: null,
});
function submit() {
    form.post("/product/import", {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            toastr.success("Products Imported.");
        },
        onError: () => {
            toastr.error("Invalid file import");
        },
    });
}
</script>

<template>
    <Head>
        <title>Product Bulk Import</title>
    </Head>
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Bulk Import</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">
                                    Bulk Import
                                </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="jumbotron bg-white">
                                <h1 class="display-4">Instructions :</h1>
                                <p>
                                    1. Download the format file and fill it with
                                    proper data.
                                </p>
                                <p>
                                    2. You can download the example file to
                                    understand how the data must be filled.
                                </p>
                                <p>
                                    3. Once you have downloaded and filled the
                                    format file upload it in the form below and
                                    submit.
                                </p>
                                <p>
                                    4. After uploading products you need to edit
                                    them and set product s images and choices.
                                </p>
                                <p>
                                    5. You can get category and sub-category id
                                    from their list please input the right ids.
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Import Products File
                                    </h3>

                                    <div class="card-tools">
                                        <a
                                            type="button"
                                            class="btn btn-primary"
                                            target="_blank"
                                            :href="'../storage/files/import_product.xlsx'"
                                        >
                                            Download Format
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <form
                                    @submit.prevent="submit"
                                    enctype="multipart/form-data"
                                >
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    style="border: none"
                                                    @input="
                                                        form.import_file =
                                                            $event.target.files[0]
                                                    "
                                                    required
                                                />
                                            </div>
                                        </div>

                                        <hr />
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </form>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
