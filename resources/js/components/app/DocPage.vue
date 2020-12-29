<template>
  <div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
      <div class="page-hero page-container" id="page-hero">
        <div class="padding d-flex">
          <div class="page-title">
            <h2 class="text-md text-highlight">Document</h2>
            <small class="text-muted">Your created documents.</small>
          </div>
          <div class="flex"></div>
        </div>
      </div>

      <div class="page-content page-container" id="page-content">
        <div class="padding">
          <div id="invoice-list" data-plugin="invoice">
            <div class="toolbar">
              <div class="btn-group">
                <button
                  class="btn btn-sm btn-icon btn-white sort hide"
                  data-sort="item-title"
                  data-toggle="tooltip"
                  title="Sort"
                >
                  <i class="sorting"></i>
                </button>
              </div>
              <form class="flex">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control form-control-theme form-control-sm search"
                    placeholder="Search"
                    required
                  />
                  <span class="input-group-append">
                    <button key="search_doc" class="btn btn-white no-border btn-sm" type="button">
                      <span class="d-flex text-muted">
                        <i data-feather="search"></i>
                      </span>
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
                    <th
                      class="text-muted sort sortable"
                      data-sort="id"
                      style="width:40px;text-align:center"
                    >No.</th>
                    <th class="text-muted sort sortable" data-sort="item-company">File Name</th>
                    <th class="text-muted" style="width:60px;">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">

                  <list-doc v-for="doc in letter" :key="doc.id" :doc="doc"></list-doc>

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
import axios from "axios";
import DocList from '../templates/parts/DocList'

export default {
  data() {
    // let date = new Date(this.tgl_surat)
    return {
      letter: []
    };
  },
  methods: {
    viewLetter() {
      axios.get('api/view')
      .then(response => {
        this.letter = response.data
        // console.log(response.data[0]);
        
      })
      .catch(error => {
        alert(error)
      })
    }
  },
  components: {
    'list-doc': DocList
  },
  created() {
    this.viewLetter()
  }
};
</script>

<style>
</style>
