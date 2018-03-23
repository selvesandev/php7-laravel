<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Data</div>
            <div class="panel-body">

                <div v-show="notification.success===true" class="alert alert-success">
                    {{notification.message}}
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="5%">S.no</th>
                        <th width="15%">Name</th>
                        <th>Email</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(data,key) in vueData">
                        <td>{{++key}}</td>
                        <td>{{data.uname}}</td>
                        <td>{{data.email}}</td>
                        <td>
                            <button v-on:click="deleteAction(data.id)" class="btn btn-danger btn-sm">Del</button>
                            <button v-on:click="editRedirect(data.id)" class="btn btn-default btn-sm">Edit</button>
                            <button class="btn btn-success btn-sm">View</button>
                        </td>
                    </tr>
                    <tr v-show="vueData.length<1">
                        <td colspan="4">No Data Found. You can create a new one
                            <router-link to="/create">here</router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notification: {
                    success: null,
                    message: ''
                },
                vueData: [],
            }
        },

        methods: {
            deleteAction(id) {
                if (!id) return false;
                let conf = confirm('Are you sure');
                if (conf) {
                    axios.delete(server._url + '/api/delete-data/' + id).then(response => {
                        if (response.data.status === true) {
                            this.fetchAllData();
                            this.notification.success = true;
                            this.notification.message = 'Data was deleted successfully #' + id;

                            let $this = this;
                            setTimeout(() => {
                                $this.notification.success = null;
                                $this.notification.message = '';
                            }, 3000)
                        }
                    });
                }
            },

            fetchAllData() {
                axios.get(server._url + '/api/get-data').then(response => {
                    if (response.data.status === true) {
                        this.vueData = response.data.vue;
                    }
                });
            },

            editRedirect(id) {
                if (!id) return false;
                let conf = confirm('Are you sure');
                if (conf) {
                    this.$router.push({name: 'edit-route', params: {id: id}});
                }
            }

        },
        beforeCreate() {

        },
        created() {
            this.fetchAllData();
        },
        beforeMount() {

        },
        mounted() {
        }
    }
</script>

<style>

</style>