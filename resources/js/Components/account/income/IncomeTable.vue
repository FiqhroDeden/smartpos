<script setup>
const props = defineProps({ incomes: Object });

function formatDate(dateString) {
    const date = new Date(dateString);
    const options = {
        day: "numeric",
        month: "short",
        year: "numeric",
        // hour: "numeric",
        // minute: "numeric",
        // hour12: true,
    };
    return date.toLocaleDateString("en-US", options);
}
</script>

<template>
    <div class="card">
        <div class="card-header">
            <div
                class="row justify-content-between align-items-center flex-grow-1"
            >
                <div class="col-12 col-md-6 col-lg-5 mb-3 mb-lg-0">
                    <form
                        action="https://6pos.6amtech.com/admin/account/add-expense"
                        method="GET"
                    >
                        <div
                            class="input-group input-group-merge input-group-flush"
                        >
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <input
                                id="datatableSearch_"
                                type="search"
                                name="search"
                                class="form-control"
                                placeholder="Search by description"
                                value=""
                                required
                            />
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-7">
                    <form
                        action="https://6pos.6amtech.com/admin/account/add-expense"
                        method="GET"
                    >
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label
                                        class="input-label"
                                        for="exampleFormControlInput1"
                                        >From
                                    </label>
                                    <input
                                        id="from_date"
                                        type="date"
                                        name="from"
                                        class="form-control"
                                        value=""
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label
                                        class="input-label"
                                        for="exampleFormControlInput1"
                                        >To
                                    </label>
                                    <input
                                        id="to_date"
                                        type="date"
                                        name="to"
                                        class="form-control"
                                        value=""
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button href="" class="btn btn-success mt-4">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-tools"></div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>ACCOUNT</th>
                        <th>TYPE</th>
                        <th>AMOUNT</th>
                        <th>DESCRIPTION</th>
                        <th>DEBIT</th>
                        <th>CREDIT</th>
                        <th>BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="income in incomes" :key="income.id">
                        <td>{{ formatDate(income.created_at) }}</td>
                        <td>{{ income.account.title }}</td>
                        <td>
                            <span class="badge badge-success">{{
                                income.type
                            }}</span>
                        </td>

                        <td>{{ income.amount }} $</td>
                        <td>{{ income.description }}</td>
                        <td>{{ income.debit }} $</td>
                        <td>{{ income.credit }} $</td>
                        <td>{{ income.balance }}$</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</template>
