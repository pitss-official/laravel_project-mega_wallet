<template>

    <div class="col-md-10 mt-4">
        <div class="card">
            <div class="card-header bg">
                <h3 class="text-center label label-default bg-gradient-red">Pending Transactions</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body " >
                <table class="table table-head-fixed text-nowrap" data-page-size="5" id="schedule-tbl">
                    <thead>
                    <tr>
                        <th>S No</th>
                        <th>Amount</th>
                        <th>Sent to</th>
                        <th>Received By</th>
                        <th>Scheduled Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(m,key) in pendingTxns">
                        <td>{{key+1}}</td>
                        <td>{{m.amount}}</td>
                        <td>{{m.sentBy}}</td>
                        <td>{{m.receivedBy}}</td>
                        <td>{{new Date(m.scheduled_at).toDateString()}}</td>


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
        props: ['pendingTxns'],

    }
</script>
