<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Data</div>
            <div class="panel-body">
                <h1>{{user.uname}}</h1>
                <p>
                    <small>{{user.email}} | {{user.gender}}</small>
                </p>

                <hr>

                <h4>Hobby : {{displayHobby}}</h4>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                user: {
                    hobby: []
                }
            }
        },
        created() {
            let id = parseInt(this.$route.params.id);

            if (!id || typeof id !== 'number')
                this.$router.push('/');

            axios.get(server._url + '/api/get-data/' + id).then(response => {
                if (response.data.status === true) {
                    console.log(response.data);
                    this.user = response.data.vue;
                }
            });
        },
        computed: {
            displayHobby: function () {
                return this.user.hobby.join(', ');
            }
        }
    }
</script>
