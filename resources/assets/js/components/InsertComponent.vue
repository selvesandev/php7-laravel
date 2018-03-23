<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Create Data</div>
            <div class="panel-body">

                <div class="col-md-6 col-md-offset-3">
                    <div v-if="success===true" class="alert alert-success">
                        Data Inserted Successfully
                    </div>
                    <div v-if="success===false" class="alert alert-danger">
                        There was a problem
                    </div>
                </div>
                <form v-on:submit.prevent="insertNewData()">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>User Name</label>
                            <input v-model="userData.uname" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="userData.password" type="password" class="form-control"
                                   placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="userData.email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Hobby</label> <br>
                            <label for=""><input type="checkbox" value="dancing" v-model="userData.hobby">
                                Dancing &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input type="checkbox" value="coding" v-model="userData.hobby">
                                Coding &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input type="checkbox" value="designing" v-model="userData.hobby">
                                Designing &nbsp;&nbsp;&nbsp;</label>
                        </div>


                        <div class="form-group">
                            <label>Gender</label> <br>
                            <label for=""><input v-model="userData.gender" name="g" value="male" type="radio">
                                Male &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input v-model="userData.gender" type="radio" name="g" value="female">
                                Female &nbsp;&nbsp;&nbsp;</label>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <select v-model="userData.country" name="" id="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="nepal">Nepal</option>
                                <option value="england">England</option>
                                <option value="japan">Japan</option>
                                <option value="china">China</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea v-model="userData.address" name="" class="form-control" id="" cols="30"
                                      rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit">
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
                success: null,
                userData: {
                    uname: '',
                    email: '',
                    password: '',
                    hobby: [],
                    gender: '',
                    country: '',
                    address: ''
                }
            }
        },

        methods: {
            insertNewData() {
                let requestUrl = server._url + '/api/create-data';
                axios.post(requestUrl, this.userData).then((response) => {
                    let responseData = response.data;
                    if (responseData.status === true) {
                        this.success = true;
                        this.userData.uname = '';
                        this.userData.email = '';
                        this.userData.password = '';
                        this.userData.hobby = [];
                        this.userData.address = '';
                        this.userData.country = '';
                        let $this = this;

                        setTimeout(() => {
                            $this.success = null;
                        }, 3000)

                    } else {
                        this.success = false;
                    }
                });

            }
        }
    }
</script>

