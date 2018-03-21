<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Create Data</div>
            <div class="panel-body">

                <form action="">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Hobby</label> <br>
                            <label for=""><input type="checkbox"> Dancing &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input type="checkbox"> Coding &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input type="checkbox"> Designing &nbsp;&nbsp;&nbsp;</label>
                        </div>


                        <div class="form-group">
                            <label>Gender</label> <br>
                            <label for=""><input type="radio"> Male &nbsp;&nbsp;&nbsp;</label>
                            <label for=""><input type="radio"> Female &nbsp;&nbsp;&nbsp;</label>
                        </div>

                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="" id="" class="form-control">
                                <option value="">Nepal</option>
                                <option value="">England</option>
                                <option value="">Japan</option>
                                <option value="">China</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
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
    export default {}
</script>

