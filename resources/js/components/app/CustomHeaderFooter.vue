<template>
  <div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
      <div class="page-hero page-container" id="page-hero">
        <div class="padding d-flex">
          <div class="page-title">
            <h2 class="text-md text-highlight">Header & Footer</h2>
            <small class="text-muted">Add custom header and footer</small>
          </div>
          <div class="flex"></div>
        </div>
      </div>
      <div class="page-content page-container" id="page-content">
        <div class="padding">
          <div class="form-group">
            <button data-target="#addDesign" data-toggle="modal" class="btn btn-rounded btn-primary">Add Design</button >
          </div>

          <!-- modal add design -->
          <div
            class="modal fade"
            id="addDesign"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add your custom header and footer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Name your design</label>
                    <input maxlength="18" v-model="name" type="text" class="form-control" />
                    <span v-if="count < 1"><small class="text-muted text-danger">Remaining: {{ count }}</small></span>
                    <span v-else><small class="text-muted text-success">Remaining: {{ count }}</small></span>
                  </div>
                  <div class="form-group">
                    <label>Tell us lil bit about your design</label>
                    <input v-model="desc" type="text" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Upload your header</label>
                    <input @change="headerImage" type="file" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Upload your footer</label>
                    <input @change="footerImage" type="file" class="form-control" />
                  </div>
                </div>
                <div class="modal-footer">
                  <button
                    v-if="name && desc && header && footer"
                    @click="uploadHeaderFooter"
                    type="button"
                    class="btn btn-primary"
                    data-dismiss="modal"
                  >Upload</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end of modal -->

          <div class="table-responsive">
            <table class="table table-theme table-row v-middle">
              <thead>
                <tr>
                  <th style="width:20px;"></th>
                  <th
                    class="text-muted sort sortable"
                    data-sort="id"
                    style="width:40px;text-align:center"
                  >ID.</th>
                  <th class="text-muted sort sortable" data-sort="item-company">Template Name</th>
                  <th class="text-muted sort" style="width:60px;">Actions</th>
                </tr>
              </thead>
              <tbody class="list">
                <!-- <hf-list v-for="(hf, index) in hfarr" :key="index" :hf="hf"></hf-list> -->

                <tr v-for="(hf, index) in hfarr.hf_list" :key="index" class="v-middle" :data-id="index">
                  <td></td>
                  <td style="min-width:30px;text-align:center">
                    <small class="text-muted">{{ hf.id }}</small>
                  </td>
                  <td class="flex">
                    <div class="item-company">{{hf.name}}</div>
                    <div class="item-mail text-muted h-1x d-none d-sm-block">
                      {{ hf.desc }}
                      <!-- <span v-for="field in data" :key="field">{{ field }},</span> -->
                    </div>
                  </td>
                  <td style="width: 15px">
                    <span class="item-amount d-none d-sm-block text-sm">
                      <button
                        data-target="#updateModal"
                        data-toggle="modal"
                        class="btn btn-rounded btn-primary"
                        @click="modalUpdate(hf.id, hf.name, hf.desc, index)"
                      >Update</button>
                    </span>
                  </td>
                  <td style="width: 15px">
                    <span class="item-amount d-none d-sm-block text-sm">
                      <div
                        data-target="#confirmModal"
                        data-toggle="modal"
                        class="btn btn-rounded btn-danger"
                        @click="modalDelete(hf.id, hf.name, index)"
                      >Delete</div>
                    </span>
                  </td>
                </tr>

                <!-- update modal -->
                <div
                  class="modal fade"
                  id="updateModal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update your Header and Footer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Name your design</label>
                          <input maxlength="18" v-model="name" type="text" class="form-control" />
                          <span v-if="count < 1"><small class="text-muted text-danger">Remaining: {{ count }}</small></span>
                          <span v-else><small class="text-muted text-success">Remaining: {{ count }}</small></span>
                        </div>
                        <div class="form-group">
                          <label>Tell us lil bit about your design</label>
                          <input v-model="desc" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                          <label>Change your header</label>
                          <input @change="headerImage" type="file" class="form-control" />
                          <span><small class="text-muted">Leave blank if you don't want to change current header</small></span>
                        </div>
                        <div class="form-group">
                          <label>Change your footer</label>
                          <input @change="footerImage" type="file" class="form-control" />
                          <span><small class="text-muted">Leave blank if you don't want to change current footer</small></span>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button
                          @click="updateHeaderFooter"
                          type="button"
                          class="btn btn-primary"
                          data-dismiss="modal"
                        >Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Abort</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of update modal -->

                <!-- delete modal -->
                <div
                  class="modal fade"
                  id="confirmModal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Warning!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="h4">Hapus {{ name }}?</div>
                      </div>
                      <div class="modal-footer">
                        <button @click="deleteHeaderFooter" type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of delete modal -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ Main END-->
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      id: '',
      remove_target: '',
      desc: "",
      header: "",
      footer: "",
      hfarr: [],
    };
  },
  methods: {
    headerImage(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = e => {
        this.header = e.target.result;
      };
      console.log(this.header);      
    },
    footerImage(e) {
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = e => {
        this.footer = e.target.result;
        console.log(e);
      };
    },
    uploadHeaderFooter() {
      axios({
        method: "post",
        url: "api/header_footers",
        data: {
          name: this.name,
          desc: this.desc,
          header: this.header,
          footer: this.footer,
          user_id: localStorage.getItem('id')
        }
      })
        .then(response => {
          alert(response.data.message);
          this.hfarr.hf_list.push(response.data.new_data)       
        })
        .catch(error => {
          console.log(error);
        });
    },
    getHeaderFooter() {
      axios
        .get("api/header_footers")
        .then(response => {
          this.hfarr = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateHeaderFooter() {
      axios({
        method: "put",
        url: `api/header_footers/${this.id}`,
        data: {
          name: this.name,
          desc: this.desc,
          header: this.header,
          footer: this.footer,
          user_id: localStorage.getItem('id')
        }
      })
        .then(response => {
          alert(response.data.message);
          this.hfarr.hf_list.splice(this.remove_target, 1)
          this.hfarr.hf_list.push(response.data.new_hf)
        })
        .catch(error => {
          console.log(error);
        });
    },

    deleteHeaderFooter() {
      axios({
        method: "delete",
        url: `api/header_footers/${this.id}`,
        data: {
          user_id: localStorage.getItem('id')
        }
      })
        .then(response => {
          alert(response.data.message);
          // remove from the DOM
          this.hfarr.hf_list.splice(this.remove_target, 1)
        })
        .catch(error => {
          console.log(error);
        });
    },
    modalUpdate(id, name, desc, index) {
      this.name = name
      this.desc = desc
      this.id = id
      this.remove_target = index
    },
    modalDelete(id, name, index) {
      this.id = id
      this.name = name
      this.remove_target = index     
    }
  },
  mounted() {
    this.getHeaderFooter();
  },
  computed: {
    count() {
      let count = 18
      return count - this.name.length
    }
  }
};
</script>

<style>
</style>
