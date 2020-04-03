<template>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component - chngd

                    </div>

                </div>
            </div>
        </div>
</template>

<script>
    export default {


        created(){
            axios.post('/api/wallet/transaction');
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
