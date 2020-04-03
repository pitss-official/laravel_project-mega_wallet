<template>

    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-gradient-yellow">
                <h3 class="card-title">Loan Requests</h3>

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
                        <th>Requested By</th>
                        <th>Requested Date</th>
                        <th>Approve/Deny</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr  v-for="(m,key) in loanRequests" v-model="rqst=m">
                        <td>{{key+1}}</td>
                        <td>{{m.amount}}</td>
                        <td>{{m.requestedBy}}</td>


                        <td>{{new Date(m.created_at).toDateString()}}</td>
                        <td class="btn-success" v-on:click="approve">Approve</td>
                        <td class="btn-danger" v-on:click="deny">Deny</td>


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

                loanRequests: [],
                rqst: []
            };
        },

        created() {
            axios.get('/api/all/loan/requests')
                .then(response=>{
                   this.loanRequests = response.data;
                });
        },

        methods:{
            approve(){
                console.log(this.rqst);
                axios.post('/api/approve/loan', {'id': this.rqst.id, 'rqstdBy' : this.rqst.requestedBy, 'amount' : this.rqst.amount})
                    .then(response => {
                        axios.get('/api/all/loan/requests')
                            .then(response=>{
                                this.loanRequests = response.data;
                            });

                    })

            },

            deny(){
                axios.post('/api/deny/loan', {'id': this.rqst.id});
                axios.get('/api/all/loan/requests')
                    .then(response=>{
                        this.loanRequests = response.data;
                    });
            },

        }

    }
</script>
