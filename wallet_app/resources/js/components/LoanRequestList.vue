<template>

    <div class="col-md-10 mt-4">
        <div class="card">
            <div class="card-header bg-gradient-yellow">
                <h3 class="card-title text-white">My Requests</h3>

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
        props: ['loanRequests'],

    }
</script>
