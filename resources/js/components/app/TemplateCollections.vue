<template>
  <div id="content" class="flex ">
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Templates</h2>
                        <small class="text-muted">Your awesome templates</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div id="invoice-list" data-plugin="invoice">
                        <div class="toolbar ">
                            <form class="flex">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-theme form-control-sm search"
                                        placeholder="Search" required>
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
                                        <th style="width:20px;"></th>
                                        <th class="text-muted sort sortable" data-sort="id"
                                            style="width:40px;text-align:center">ID.</th>
                                        <th class="text-muted sort sortable" data-sort="item-company">Template Name</th>
                                        <th class="text-muted sort" style="width:60px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    
                                    <template-list @get-id="get_id_to_delete(template.id, index)" @delete-template="delete_template" v-for="(template, index) in templates" :key="template.id" :list="template"></template-list>

                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="d-flex">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">5</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                            <small class="text-muted py-2 mx-2">Total <span id="count">15</span> items</small>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ############ Main END-->
    </div>
</template>

<script>
import axios from 'axios'
import List from '../templates/parts/List'
export default {
    data () {
        return {
            templates: [],
            target_id: '',
            target_index: ''
        }
    },
    components: {
        'template-list': List
    },
    methods: {
        view_data () {
            axios.get('api/templates')
            .then(response => {
                this.templates = response.data
            })
            .catch(error => {
                console.log(error);
            })
        },
        delete_template() {
            axios({
                method: 'delete',
                url: `api/templates/${this.target_id}`,
                data: {
                    id: localStorage.getItem('id')
                }
            })
            .then(response => {
                alert(response.data.message)
                this.templates.splice(this.target_index, 1)
            })
            .catch(error => {
                console.log(error);  
                localStorage.removeItem('id')                  
            })
        },
        get_id_to_delete(id, index){
            // localStorage.setItem('id', id)
            this.target_id = id
            this.target_index = index
        }
    },
    created () {
        this.view_data()
        console.log(this.templates);        
    },
}
</script>

<style>

</style>