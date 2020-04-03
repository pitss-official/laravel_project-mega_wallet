<template>

    <div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ml-0 mr-0" v-for="nav in navigation">

                    <router-link :to="nav.link" class="nav-link " active-class="active">
<!--                    <router-link to="#" class="nav-link"></router-link>-->
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p class="  text-white p-2 font-weight-bold" style="">
                        {{nav.name}}
                    </p>
                    </router-link>

                </li>

            </ul>
        </nav>
    </div>

</template>

<script>
    export default {
        props: ['itemNavigation'],
        data(){
            return{
                navigation: _.cloneDeep(this.itemNavigation)
            };
        },

        created(){
            axios.post('/api/wallet/transaction');
        },

        mounted() {

        }
    }
</script>
