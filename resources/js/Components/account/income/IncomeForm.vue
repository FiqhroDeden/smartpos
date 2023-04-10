<template>
    <div class="card">
        <div class="card-body">
            <form
                action="https://6pos.6amtech.com/admin/category/store"
                method="post"
                enctype="multipart/form-data"
            >
                <input
                    type="hidden"
                    name="_token"
                    value="6ygODdB6JbOb9ADW7Y8V6KxAynhVeLQVmC3DALxc"
                />
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">
                                Account
                                <span class="text-danger">* </span></label
                            >
                            <select name="" class="form-control" id="">
                                <option value="">--Select--</option>
                                <option value="">Standar</option>
                                <option value="">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Description </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Description"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Amount </label>
                            <input
                                type="number"
                                name="name"
                                class="form-control"
                                placeholder="Initial Balance"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Date </label>
                            <input
                                type="date"
                                name="name"
                                class="form-control"
                            />
                        </div>
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>
