<template>

    <div class="justify-content-center col-md-12">
        <h2 class="text-center label label-default bg-gradient-green" v-if="giftCards[0]">Available Gift Cards</h2>
    <div v-for="gift in giftCards" v-model="selectedCard=gift">
        <div class="col-md-6 mt-3" style="position: relative; float: left" >
            <div class="card rounded-0 border-0 card1 pr-xl-4 pr-lg-3 p-4">
                <div class="row ">
                    <div class="col-11">
                        <h3 class=" mt-4 mb-4" >Gift card</h3>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 fit-image" style= "position: relative; float: left"> <img src="/img/gift.png" height="150px" width="150px"> </div>

<!--                <div class="row justify-content-center">-->
<!--                    <div class="col-11">-->
<!--                        <h1 class="text-center mt-4 mb-0" id="sub-heading1">Show love to your dear ones</h1>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row justify-content-center">-->
<!--                    <div class="col-11">-->
<!--                        <p class="text-center mt-0 mb-3" id="sub-heading2">of unlimited access and infinite joy</p>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="col-md-6" style= "position: relative; float: left">
                    <h2 >Value {{gift.amount}}</h2>
                    <p>Sent by user id {{gift.sentBy}}</p>
                    <p class="badge badge-info">{{gift.message}}</p>
                    <br>
                    <button  class="btn btn-success" @click="redeem">Redeem</button>
                </div>
                </div>

            </div>


        </div>


    </div>


</div>


</template>

<script>
    export default {
        props: ['giftCards'],
        data(){

            return{
                'selectedCard': [],
                errors: [],

            };
        },

        methods:{
            redeem(){
                axios.post('/api/redeem/gift/card', {'id': this.selectedCard.id})
                    .then(response => {
                        swal.fire({
                            icon: 'success',
                            title: 'Bravo!',
                            text: 'You have successfully redeemed gift card',
                            type: 'success',
                            backdrop: 'rgba(0, 0, 123, 0.4)',
                        });

                        axios.get('/api/find/gift/cards')
                            .then(response => {
                                this.giftCards = response.data;
                            });

                    })
                    .catch(error => {
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
        }
    }
</script>
