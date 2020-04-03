<template>
    <div class="justify-content-center col-md-12">
        <h2 class="text-center label label-default bg-gradient-green" v-if="voucherDetails[0]">Available Vouchers</h2>
        <div  v-for="voucher in voucherDetails.keys">
        <div class="col-md-6 mt-3" style="position: relative; float: left">
            <div class="p-3 bg-gradient-indigo" style="height: 180px">
                <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-lg">
                        Voucher
                    </div>
                </div>
                Voucher Details <br />  <br />
                <p>Key: {{voucher}}</p>

                <p>Value: {{voucherDetails.value}}</p>
                <small>Validity: {{voucherDetails.validity}}</small>
            </div>
        </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['voucherDetails'],

    }
</script>
