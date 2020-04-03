<template>

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-yellow">
                <h3 class="card-title">My Transactions</h3>

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
                    <tfoot>
                    <td colspan="2">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="text-right">
                                        <ul class="pagination">  </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</template>

<script>
    import "footable"
    export default {

        data(){
            return{
                count: 0,
                moneyTxns: [],

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
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
