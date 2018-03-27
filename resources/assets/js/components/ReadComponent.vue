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

                    <data-display v-on:edit="editRedirect($event.id)"
                                  v-on:delete="deleteAction($event.id)"
                                  v-on:view="viewDetails($event.id)"
                                  :users="vueData">
                        <h4>{{vueData.length+' users' }}</h4>
                    </data-display>


                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import DataDisplay from './DataDisplay.vue';

    export default {
        components: {
            DataDisplay
        },
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
            },
            viewDetails(id) {
                if (!id) return false;
                this.$router.push({name: 'view-single', params: {id: id}});
            }

        },
        beforeCreate() {

        },
        updated() {

        },
        created() {
            this.fetchAllData();


//            this.$on('edit', function (x) {
//
//            });
//            this.$on('view', function () {
//
//            });
        },
        beforeMount() {

        },
        mounted() {
            let $this = this;
            myEventBus.$on('success', () => {
                alert('successfully');
                $this.notification.success = true;
                $this.notification.message = 'Data updated';
                console.log($this.notification);
            });
        }
    }
</script>

<style>

</style>