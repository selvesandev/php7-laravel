<template>
    <tbody>
    <slot></slot>
    <tr v-for="(data,key) in users">
        <td>{{++key}}</td>
        <td>{{data.uname}}</td>
        <td>{{data.email}}</td>
        <td>
            <button v-on:click="deleteEmit(data.id)" class="btn btn-danger btn-sm">Del</button>
            <button v-on:click="editEmit(data.id)" class="btn btn-default btn-sm">Edit</button>
            <button class="btn btn-success btn-sm" v-on:click="viewEmit(data.id)">View</button>
        </td>
    </tr>
    <tr v-show="users.length<1">
        <td colspan="4">No Data Found. You can create a new one
            <router-link to="/create">here</router-link>
        </td>
    </tr>
    </tbody>
</template>

<script>
    export default {
        props: {
            users: {
                type: Array,
                required: true
            }
        },
        methods: {
            deleteEmit(id) {
                this.$emit('delete', {id: id})
            },
            editEmit(id) {
                this.$emit('edit', {id: id});
            },
            viewEmit(id) {
                this.$emit('view', {id: id});
            }
        }
    }
</script>