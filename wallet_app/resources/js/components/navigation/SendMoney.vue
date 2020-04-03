<template>

    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <div class="card card-primary">
                <div class="card-header bg-gradient-yellow">
                    <h3 class="card-title">Send Money</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form @submit.prevent="send" class="p-2">


                    <div class="card-body">

                        <!-- select -->
                        <div class="form-group">
                            <label>Select User</label>
                            <select class="form-control" name="receiver" v-model="receiver">

                                <option :value="user.id" v-for="user in users">{{user.name}}</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label>Enter Amount</label>
                            <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount" v-model="amount">

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
              errors: []
          };
        },


        methods: {

            send(){
                axios.post('/api/transaction/send/money', {'userID': this.receiver, 'amount': this.amount})
                    .then(response => {
                        swal.fire({
                            icon: 'success',
                            title: 'Bravo!',
                            text: 'You have successfully sent money',
                            type: 'error',
                            backdrop: 'rgba(0, 0, 123, 0.4)',
                        })

                    })
                    .catch(error => {
                        let msgs = Object.values(error.response.data.errors);
                        this.errors = [].concat.apply([], msgs);
                        swal.fire({
                            icon: 'error',
                            title: 'Error occurred',
                            text: this.errors,
                            type: "error",
                            backdrop: `rgba(0, 0, 123, 0.4)`
                        })

                    });
            }
        },

        mounted() {
            axios.get('/api/fetch/other/users')
                .then(response => {
                    this.users = response.data;
                    console.log(response.data);

                });
        }
    }
</script>
