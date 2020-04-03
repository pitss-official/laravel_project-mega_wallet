<template>

    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <div class="card card-primary">
                <div class="card-header bg-gradient-yellow">
                    <h3 class="card-title">Redeem Voucher</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form @submit.prevent="save" class="p-2">

                    <div class="card-body">
                        <div class="form-group">
                            <div class="row d-flex justify-content-center mt-5">

                                <br>
                                <div class="col-md-6 mt-3"  >
                                    <div class="p-3 bg-gradient-indigo" style="height: 300px">
                                        <div class="ribbon-wrapper ribbon-xl">
                                            <div class="ribbon bg-warning text-lg">
                                                Voucher
                                            </div>

                                        </div>
                                        Voucher Key <br />  <br />

                                        <input type="text" v-model="voucherKey">

                                        <br>
                                        <div>
                                            <p v-if="voucherDetails">Rs {{ voucherDetails.value}}</p>
                                            <small v-if="voucherDetails">Valid till {{voucherDetails.validity}}</small>
                                        </div>

                                        <br>
                                        <br>
                                        <button type="submit" class="btn bg-gradient-yellow">Redeem</button>
                                    </div>
                                </div>
                            </div>

                        <!-- /.card-body -->

                    </div>
                    </div>
                </form>
            </div>
            <!--card ends -->
            <div id="">


            </div>
        </div>
    </div>

</template>

<script>

    export default {
        data(){
            return{
                'voucherKey': '',
                'rs': 'Rs ',
                'valid': 'Valid till ',
                'voucherDetails': '',

            };
        },

        methods:{
            save(){
                axios.post('/api/wallet/redeem/voucher', {'key': this.voucherKey})
                    .then(response=> {
                        if(response.data.error){

                            swal.fire({
                                icon:'error',
                                title: 'Error occurred',
                                text: response.data.error,
                                type: "error",
                                backdrop: `rgba(0, 0, 123, 0.4)`
                            })

                        }
                        else{
                            swal.fire({
                                icon: 'success',
                                title: 'Bravo!',
                                text: 'You have successfully redeemed vouchers',
                                type: 'success',
                                backdrop: 'rgba(0, 0, 123, 0.4)',
                            });

                        }
                        console.log(response.data);
                        this.voucherDetails = response.data;

                    })
                    .catch(error=> {
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
            },

        },
    }
</script>
