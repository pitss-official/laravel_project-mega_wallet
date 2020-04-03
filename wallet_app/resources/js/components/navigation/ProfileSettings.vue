<template>

    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">

            <div class="card card-primary">
                <div class="card-header bg-gradient-yellow">
                    <h3 class="card-title">Add Money</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form @submit.prevent="save" class="p-2">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="userDetails.name">

                            <!--                            <p class="text-danger" v-text="errors.get('amount')"></p>-->
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" v-model="userDetails.email">

                            <!--                            <p class="text-danger" v-text="errors.get('amount')"></p>-->
                        </div>

                        <div class="form-group">
                            <label>Current profile thumbnail</label>
                            <img v-bind:src="userDetails.image">


                            <!--                            <p class="text-danger" v-text="errors.get('amount')"></p>-->
                        </div>

                        <div class="form-group">
                            <label >Change profile thumbnail</label>
                            <input type="file" class="form-control" v-on:change="onFileChange">
                            <img class="card-img-top" :src="logo" alt="Card image cap" v-if="logo">

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



    export default {

        data(){

            return{

                //errors : new Errors(),
                errors : [],
                userDetails: [],
                logo: null



            }
        },

        created(){
            axios.get('/api/get/user/details')
                .then(response =>{
                    this.userDetails = response.data;
                });
        },

        methods:{

            onFileChange(e){
                // console.log(e.target.files[0]);
                // this.file = e.target.files[0];
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);

            },

            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.logo= e.target.result;
                };
                reader.readAsDataURL(file);
            },

            save(){
                let formData = new FormData();
                const config = {
                    headers:{'Content-Type' : 'multipart/form-data'}
                };
                if(this.logo){formData.append('logo', this.logo);}


                axios.post('/api/change/user/details', {
                    'id': this.userDetails.id, 'name': this.userDetails.name, 'email': this.userDetails.email,  'image': this.logo
                }
                )
                    .then(response => {
                        swal.fire({
                            icon: 'success',
                            title: 'Bravo!',
                            text: 'You have successfully changed settings',
                            type: 'success',
                            backdrop: 'rgba(0, 0, 123, 0.4)',
                        })
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
