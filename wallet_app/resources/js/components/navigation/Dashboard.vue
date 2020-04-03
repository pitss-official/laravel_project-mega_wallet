<template>
<div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 v-model="currBalance">₹ {{currBalance}}</h3>

                            <p>Current Balance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 v-model="totalPendingLoans">{{totalPendingLoans}}</h3>

                            <p>Pending Loan Requests</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 v-model="totalGiftCards">{{totalGiftCards}}</h3>

                            <p>Available Gift Cards</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 v-model="totalTxns">{{totalTxns}}</h3>

                            <p>Total Transactions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-gradient-yellow">
                            <h3 class="card-title">Latest Transactions</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " >
                            <table class="table table-head-fixed text-nowrap" data-page-size="5" id="transactions-table">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Amount</th>
                                    <th>Sent to</th>
                                    <th>Received By</th>
                                    <th>Transaction Id</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(m,key) in moneyTxns">
                                    <td>{{key+1}}</td>
                                    <td>{{m.amount}}</td>
                                    <td>{{m.sentBy}}</td>
                                    <td>{{m.receivedBy}}</td>
                                    <td>{{m.id}}</td>
                                    <td>{{new Date(m.created_at).toDateString()}}</td>


                                </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-gradient-yellow">
                            <h3 class="card-title">My Requests</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " >
                            <table class="table table-head-fixed text-nowrap" data-page-size="5" id="loan-tbl">
                                <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Requested Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(m,key) in loanRequests">
                                    <td>{{key+1}}</td>
                                    <td>{{m.amount}}</td>
                                    <td v-if="m.isApproved == 1"><span class="badge badge-success">Approved</span></td>
                                    <td v-else-if="m.isCancelled==1"><span class="badge badge-danger">Cancelled</span></td>
                                    <td v-else><span class="badge badge-warning">Pending</span></td>


                                    <td>{{new Date(m.created_at).toDateString()}}</td>


                                </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!--row ends -->
            <div class="row mt-3">
                <gift-cards :gift-cards="giftCards"></gift-cards>

            </div>

        </div>
    </section>
</div>

</template>


<script>
    import "footable"
    export default {

        data(){
            return{
                count: 0,
                moneyTxns: [],
                loanRequests: [],
                giftCards: [],

                currBalance: '',
                totalTxns: '',
                totalPendingLoans: '',
                totalGiftCards: '',


            };
        },


        created(){
            axios.get('/api/my/transactions')
                .then(response =>{
                    this.moneyTxns = response.data;
                    setTimeout(()=>{
                        $('#transactions-table').footable();
                    },1000);



                })
                .catch(err => {

                });

            axios.get('/api/get/loan/requests')
                .then(response => {
                    this.loanRequests = response.data;
                    setTimeout(()=>{
                        $('#loan-tbl').footable();
                    },1000);
                });

            axios.get('/api/find/gift/cards')
                .then(response => {
                    this.giftCards = response.data;
                });
        },

        mounted() {
            axios.get('/api/get/current/balance')
                .then(response =>{
                    this.currBalance = response.data;
                });

            axios.get('/api/get/total/txns')
                .then(response =>{
                    this.totalTxns = response.data;
                });

            axios.get('/api/get/total/pending/requests')
                .then(response =>{
                    this.totalPendingLoans = response.data;
                });

            axios.get('/api/get/available/gift/cards')
                .then(response =>{
                    this.totalGiftCards = response.data;
                });
        }
    }
</script>

