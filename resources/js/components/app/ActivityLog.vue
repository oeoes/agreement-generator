<template>
    <div id="content" class="flex ">
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Log Activity</h2>
                        <small class="text-muted">Here are users activities</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div id="invoice-list" data-plugin="invoice">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-theme table-row v-middle">
                                        <thead>
                                            <tr>
                                                <!-- <th style="width:20px;"></th> -->
                                                <th class="text-muted sort sortable" data-sort="id"
                                                    style="width:40px;text-align:center">No.</th>
                                                <th class="text-muted sort sortable" data-sort="item-company">Name</th>
                                                <th class="text-muted sort sortable" data-sort="item-amount">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            
                                        <tr v-for="(user, index) in users" :key="index" class="v-middle" data-id="7">
                                            <td style="min-width:30px;text-align:center">
                                            <small class="text-muted">{{ index+1 }}</small>
                                            </td>
                                            <td class="flex">
                                            <a href="" @click.prevent="view(user.id)" class="item-company ajax h-1x">{{ user.name }}</a>
                                            <div class="item-mail text-muted h-1x d-none d-sm-block">Last login: {{ user.last_login }}</div>
                                            </td>
                                            <td>
                                            <span class="item-date text-muted text-sm d-none d-md-block">{{ user.email }}</span>
                                            </td> 
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card pt-4 pb-4 pr-3 pl-3 mt-4" style="height: 60%; overflow-y: auto">
                                    <h2 class="text-md text-highlight">{{ selected_user.name }}</h2>
                                    <small class="text-muted">Logs activity</small>
                                    <hr>

                                    <div class="mb-2" v-for="(log, index) in logs" :key="index">
                                        <span style="background: #fbfbfd; box-shadow: 0 3px 4px rgba(0,0,0,.075);color: #ca473f;padding: 2px 5px;">[{{ log.created_at }}] :</span> {{ log.activity }}
                                    </div>
                                </div>
                            </div>
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

export default {
    data () {
        return {
            users: [],
            logs: [],
            selected_user: ''
        }
    },
    methods: {
        getUsers() {
            axios.get('api/users')
            .then(response => {
                this.users = response.data                           
            })
        },
        log_index() {
            let data = {
                user_id: localStorage.getItem('id')
            }
            axios({
                method: 'post',
                url: 'api/logs/onload/index',
                data: data
            })
            .then(response => {               
                this.logs = response.data.logs
                this.selected_user = response.data.user
            })
        },
        view(id) {
            axios.get(`api/logs/${id}`)
            .then(response => {
                this.logs = response.data.logs
                this.selected_user = response.data.user
            })
        }
    },
    created() {
        this.getUsers()
        this.log_index()
    }
}
</script>

<style>

</style>