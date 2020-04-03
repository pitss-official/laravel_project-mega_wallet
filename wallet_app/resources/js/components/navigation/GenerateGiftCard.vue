<template>

    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
                                <div class="card rounded-0 border-0 card1 pr-xl-4 pr-lg-3">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <h3 class="text-center mt-4 mb-4" id="heading0">Gift card details</h3>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2 fit-image"> <img src="https://i.imgur.com/NnVWuER.png" height="200px" width="200px"> </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <h1 class="text-center mt-4 mb-0" id="sub-heading1">Show love to your dear ones</h1>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <p class="text-center mt-0 mb-3" id="sub-heading2">of unlimited access and infinite joy</p>
                                        </div>
                                    </div>
                                    <form @submit.prevent="save" class="p-2">



                                        <div class="card-body">

                                            <div class="form-group">
                                                <label>Select User</label>
                                                <select class="form-control" name="receiver" v-model="receiver">

                                                    <option :value="user.id" v-for="user in users">{{user.name}}</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Amount</label>
                                                <input type="text" class="form-control" v-model="amount" placeholder="Enter amount" name="amount">

                                            </div>

                                            <div class="form-group">
                                                <label>Enter message</label>
                                                <input type="text" class="form-control" v-model="message" placeholder="Enter message" >

                                            </div>

                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn bg-gradient-yellow">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>





    </div>

</template>

<script>

    export default {
        data(){
            return{
                users: [],
                receiver: '',
                amount: '',
                message: '',
                errors: [],

            };
        },

        mounted() {
            axios.get('/api/fetch/other/users')
                .then(response => {
                    this.users = response.data;

                });
        },

        methods:{
            save(){
                axios.post('/api/generate/gift/card', {'amount': this.amount, 'receiver':this.receiver, 'message': this.message})
                    .then(response =>{
                        swal.fire({
                            icon: 'success',
                            title: 'Bravo!',
                            text: 'You have successfully generated and sent gift card',
                            type: 'success',
                            backdrop: 'rgba(0, 0, 123, 0.4)',
                        })

                    })
                    .catch(error=>{
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
