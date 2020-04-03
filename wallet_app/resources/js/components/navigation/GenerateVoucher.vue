<template>

    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <div class="card card-primary">
                <div class="card-header bg-gradient-yellow">
                    <h3 class="card-title">Generate Voucher</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form @submit.prevent="save" class="p-2">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Number of vouchers</label>
                            <input type="text" class="form-control" v-model="numberOfVouchers" placeholder="Enter number">

                            <!--                            <p class="text-danger" v-text="errors.get('amount')"></p>-->
                        </div>

                        <div class="form-group">
                            <label>Value</label>
                            <input type="text" class="form-control" v-model="value" placeholder="Enter number">

                            <!--                            <p class="text-danger" v-text="errors.get('amount')"></p>-->
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn bg-gradient-yellow">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--card ends -->
            <div class="row col-md-12 mt-5">

                <voucher-list :voucher-details="voucherDetails"></voucher-list>
            </div>
        </div>
    </div>

</template>

<script>

    class Errors{
        constructor(){
            this.errors = {};
        }

        get(field){
            if(this.errors[field]){
                return this.errors[field][0];
            }
        }

        record(errors){
            this.errors = errors;
        }
    }

    $(document).ready(function(){
        $("#showVoucherList").hide();
    });



    export default {

        data(){

            return{
                numberOfVouchers : '',
                value : '',
                voucherDetails: [],
                //errors : new Errors(),
                errors : []


            }
        },

        methods:{



            save(){
                axios.post('/api/create/new/vouchers', {'numberOfVouchers' : this.numberOfVouchers, 'value': this.value})
                    .then(response => {
                        swal.fire({
                            icon: 'success',
                            title: 'Bravo!',
                            text: 'You have successfully created vouchers',
                            type: 'success',
                            backdrop: 'rgba(0, 0, 123, 0.4)',
                        });
                        this.voucherDetails = response.data;
                        $("#showVoucherList").show();
                    })
                    .catch(error => {
                        // this.errors.record(error.response.data)
                        let msgs = Object.values(error.response.data.errors);
                        this.errors = [].concat.apply([], msgs);
                        swal.fire({
                            icon:'error',
                            title: 'Error occurred',
                            text: this.errors,
                            type: "error",
                            backdrop: `rgba(0, 0, 123, 0.4)`
                        })
                    });
            }
        },
    }
</script>
