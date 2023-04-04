<script setup>
import { useToastr } from "@/toastr.js";
import { router, Link } from "@inertiajs/vue3";
import { inject } from "vue";
const props = defineProps({ coupons: Object });

const toastr = useToastr();

function changeStatus(id) {
    router.post("/coupon/status-update/" + id, {
        preserveState: true,
        replace: true,
    });
    toastr.success("Coupon Status updated.");
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
            router.post(route("coupon.delete", id));
            // toastr.success("Category Created.");
            Swal.fire("Deleted!", "Coupon has been deleted.", "success");
        }
    });
}
</script>
<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Coupon Table ({{ coupons.length }})</h3>

            <!-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px">
                    <input
                        type="text"
                        name="table_search"
                        class="form-control float-right"
                        placeholder="Search"
                    />

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table
                class="table table-hover text-nowrap"
                v-if="coupons.length > 0"
            >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TITLE</th>
                        <th>CODE</th>
                        <th>MIN PURCHASE</th>
                        <th>MAX DISCOUNT</th>
                        <th>DISCOUNT</th>
                        <th>DISCOUNT TYPE</th>
                        <th>START DATE</th>
                        <th>EXPIRE DATE</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(coupon, index) in coupons" :key="coupon.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ coupon.title }}</td>
                        <td>{{ coupon.code }}</td>

                        <td>{{ coupon.min_purchase }} $</td>
                        <td>{{ coupon.max_discount }} $</td>
                        <td>{{ coupon.discount_value }} $</td>
                        <td>
                            {{ coupon.discount_type ? "Percent" : "Amount" }}
                        </td>
                        <td>{{ coupon.start_date }}</td>
                        <td>{{ coupon.expire_date }}</td>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        :id="coupon.code"
                                        :checked="coupon.active"
                                        @click="changeStatus(coupon.id)"
                                        required
                                    />

                                    <label
                                        class="custom-control-label"
                                        :for="coupon.code"
                                    ></label>
                                </div>
                            </div>
                        </td>
                        <td align="center">
                            <Link
                                type="button"
                                :href="route('coupon.edit', coupon.id)"
                                class="btn btn-sm btn-warning"
                                target="_blank"
                            >
                                <i class="fas fa-edit"></i>
                            </Link>

                            <button
                                class="btn btn-sm btn-danger ml-2"
                                target="_blank"
                                @click="deleteConfirm(coupon.id)"
                            >
                                <i class="fas fa-trash"></i>
                            </button>
                            <br />
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-else>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>CODE</th>
                            <th>MIN PURCHASE</th>
                            <th>MAX DISCOUNT</th>
                            <th>DISCOUNT</th>
                            <th>DISCOUNT TYPE</th>
                            <th>START DATE</th>
                            <th>EXPIRE DATE</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                </table>
                <div class="text-center p-4">
                    <img
                        class="mb-3 img-two-plst"
                        src="https://6pos.6amtech.com/public/assets/admin/svg/illustrations/sorry.svg"
                        alt="Image Description"
                        width="100"
                        height="100"
                    />
                    <p class="mb-0">No data to show</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</template>
