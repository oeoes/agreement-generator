<template>
    <div id="content" class="flex ">
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Users</h2>
                        <small class="text-muted">Invite Users</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div id="invoice-list" data-plugin="invoice">

                        <div class="toolbar ">
                            <div class="btn-group">
                                <!-- add button -->
                                <button @click="add_user" class="btn btn-sm btn-white text-muted" data-toggle="tooltip" title="Add User">
                                    Add
                                    <!-- <i data-feather="plus" class="text-muted"></i> -->
                                </button>
                                <button class="btn btn-sm btn-icon btn-white sort hide" data-sort="item-title"
                                    data-toggle="tooltip" title="Sort">
                                    <i class="sorting"></i>
                                </button>
                            </div>
                            <form class="flex">
                                <div class="input-group">
                                    <!-- input user -->
                                    <input v-model="newemail" type="text" class="form-control form-control-theme form-control-sm search"
                                        placeholder="Search / Insert email" required>
                                    <span class="input-group-append">
                                        <button class="btn btn-white no-border btn-sm" type="button">
                                            <span class="d-flex text-muted"><i data-feather="search"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-theme table-row v-middle">
                                <thead>
                                    <tr>
                                        <!-- <th style="width:20px;"></th> -->
                                        <th class="text-muted sort sortable" data-sort="id"
                                            style="width:40px;text-align:center">No.</th>
                                        <th class="text-muted sort sortable" data-sort="item-company">Client</th>
                                        <th class="text-muted sort sortable" data-sort="item-amount"
                                            style="width:60px;">Last login</th>
                                        <th class="text-muted sort sortable" data-sort="item-badge" style="width:60px;">
                                            Status</th>
                                        <th class="text-muted" style="width:120px;">Date</th>
                                        <th style="width:50px;"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    
                                <!-- User list -->
                                <user-list v-for="(data, index) in users" :key="data.id" :user="data" :data_index="index"></user-list>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ############ Main END-->
    </div>
</template>

<script>
import axios from 'axios'
import UserList from '../templates/parts/UserList'
    export default {
        data() {
            return {
                users: [],
                newemail: '',
            }
        },
        methods: {
            get_users() {
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$authenticate.getToken()
                axios.get('api/users')
                .then(response => {
                    this.users = response.data                                
                })
                .catch(error => {
                    console.log(error)              
                })
            },
            add_user() {
                if(!this.newemail){ alert('insert email') }
                else {
                    axios({
                        method: 'post',
                        url: 'api/users',
                        data: {
                            email: this.newemail,
                            id: localStorage.getItem('id')
                        }
                    })
                    .then(response => {
                        if(response.data.status) {
                            // success
                            alert(response.data.message)
                            this.users.push(response.data.new_user)
                        }else{
                            // email exist
                            alert(response.data.message)
                        }                     
                    })
                }
            }
        },
        components: {
            'user-list': UserList
        },
        created() {
            this.get_users()
        },
    }

</script>

<style>

</style>
