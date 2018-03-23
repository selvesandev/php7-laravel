<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Update Data</div>
            <div class="panel-body">

                <form v-on:submit.prevent="editAction()">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>User Name</label>
                            <input v-model="userData.uname" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" v-model="userData.email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Hobby</label> <br>
                            <label for=""><input value="dancing" v-model="userData.hobby" type="checkbox">
                                Dancing &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input value="coding" v-model="userData.hobby" type="checkbox">
                                Coding &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input value="designing" v-model="userData.hobby" type="checkbox">
                                Designing &nbsp;&nbsp;&nbsp;</label>
                        </div>


                        <div class="form-group">
                            <label>Gender</label> <br>
                            <label for=""><input v-model="userData.gender" value="male" type="radio">
                                Male &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input v-model="userData.gender" value="female" type="radio">
                                Female &nbsp;&nbsp;&nbsp;</label>
                        </div>

                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="" v-model="userData.country" id="" class="form-control">
                                <option value="">Select Country</option>
                                <option value="nepal">Nepal</option>
                                <option value="england">England</option>
                                <option value="japan">Japan</option>
                                <option value="china">China</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="5"
                                      v-model="userData.address"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                userData: {
                    uname: '',
                    email: '',
                    hobby: [],
                    gender: '',
                    country: '',
                    address: ''
                }
            }
        },
        methods: {
            editAction() {
                let id = this.$route.params.id;
                if (!id)
                    this.$router.push('/');

                axios.post(server._url + '/api/edit-data/' + id, this.userData).then(response => {
                    if (response.data.status === true) {
                        this.$router.push('/');//
                    }
                });
            }
        },
        created() {
            let id = this.$route.params.id;
            if (!id)
                this.$router.push('/');

            axios.get(server._url + '/api/get-data/' + id).then(response => {
                if (response.data.status === true) {
                    console.log(response.data);
                    this.userData.uname = response.data.vue.uname;
                    this.userData.email = response.data.vue.email;
                    this.userData.gender = response.data.vue.gender;
                    this.userData.hobby = response.data.vue.hobby;
                    this.userData.country = response.data.vue.country;
                    this.userData.address = response.data.vue.address;

                }
            });
        }
    }
</script>

