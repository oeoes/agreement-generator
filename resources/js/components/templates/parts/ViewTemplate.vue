<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card p-3 border-0 shadow-sm">
          <div class="h3 text-center">{{ data.template_name }} Form</div>
          <hr />
          <form>
            <!-- <dynamic-form v-for="field in data.field" :key="field" :label="field" :field_name="field"></dynamic-form> -->
            <div class="form-group" v-for="(field, id) in data.field" :key="field">
              <label>{{ formatInputField(field) }}</label>
              <input v-model="form.parent_id[id]" type="text" class="form-control" value="dt.id" />
            </div>

            <div class="form-group">
              <label class="md-switch">
                <input v-model="header_footer" type="checkbox" checked />
                <i class="blue"></i>
                Gunakan Header dan Footer
              </label>
            </div>
            
            <div v-show="header_footer" class="form-group">
              Pick your favorite header and footer design.
              <hr>
              <div class="row">
                <div v-for="(hf, index) in header_footer_list" :key="index" class="col-md-4">
                  <input name="hf_" :id="`hf`+hf.id" :value="hf.id" v-model="selected_hf" type="radio">
                  <label :for="`hf`+hf.id" style="width: 100%">
                    <div class="card shadow-sm text-center p-4 header_footer">
                      {{hf.name}}
                      
                    </div>
                  </label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div @click="download" id="download" class="btn btn-primary">Download</div>
                  <div
                    data-target="#confirmModal"
                    data-toggle="modal"
                    id="simpan"
                    class="btn btn-info"
                  >Simpan</div>
                </div>
              </div>
            </div>
            <!-- modal -->
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
                    <h5 class="modal-title">Give file a name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <input
                        v-model="file_name"
                        type="text"
                        class="form-control"
                        placeholder="File name..."
                      />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button
                      @click="simpanSurat"
                      type="button"
                      class="btn btn-primary"
                      data-dismiss="modal"
                    >Confirm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of modal -->
          </form>
        </div>
      </div>

      <!-- Preview -->
      <div
        style="position: fixed; top: 12px; right: 20px; width: 40%; height: 85%; overflow-y: auto"
        class="card p-3 border-0 shadow-sm mt-5"
      >
        <div class="h4">Preview</div>
        <hr />
        <div v-html="data.content"></div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import DynamicForm from "./DinamycForm";

export default {
  data() {
    return {
      data: [],
      form: {
        parent_id: []
      },
      file_name: "",
      header_footer: false,
      header_footer_list: [],
      hf_path: '',
      selected_hf: null,
    };
  },

  methods: {
    viewTemplate() {
      axios
        .get(`api/templates/${this.$route.params.id}`)
        .then(response => {
          this.data = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getHeaderFooter() {
      axios.get('api/header_footers')
      .then(response => {
        this.header_footer_list = response.data.hf_list
        this.hf_path = response.data.path
      })
      .catch(error => {
        console.log(error);        
      })
    },
    download() {
      $("#download").html("Downloading...");
      axios({
        method: "post",
        url: "api/download",
        responseType: "arraybuffer",
        data: {
          id: this.$route.params.id,
          default_field: this.data.field,
          fields: this.form.parent_id,
          header_footer: this.header_footer,
          hf_id: this.selected_hf,
          user_id: localStorage.getItem('id') // for log
        }
      })
        .then(response => {
          let blob = new Blob([response.data], {
            type: "application/pdf"
          });
          let link = document.createElement("a");
          link.href = window.URL.createObjectURL(blob);
          link.download = "kontrak.pdf";
          document.body.appendChild(link);
          link.click();       
        })
        .catch(error => {
          console.log(error);
        })
        .finally(response => {
          $("#download").html("Download");
        });
    },

    simpanSurat() {
      $("#simpan").html("Menyimpan...");
      axios({
        method: "post",
        url: "api/simpan",
        data: {
          user_id: 1, //nanti ini akan deiganti dengan user bersangkutan
          file_name: this.file_name,
          id: this.$route.params.id,
          default_field: this.data.field,
          fields: this.form.parent_id,
          header_footer: this.header_footer,
          hf_id: this.selected_hf,
          user_id: localStorage.getItem('id') //for log
        }
      })
        .then(response => {
          alert(response.data.message);          
        })
        .catch(error => {
          alert("Something went wrong!");
        })
        .finally(response => {
          $("#simpan").html("Simpan");
        });
    },

    formatInputField(str) {
      let str_f = str.replace('_', ' ')
      let str_f_arr = str_f.split(' ')
      let str_real = ''
      for(let i=0; i < str_f_arr.length; i++) {
        str_real += str_f_arr[i][0].toUpperCase() + str_f_arr[i].slice(1) + ' '
      }

      return str_real
    }
  },
  components: {
    "dynamic-form": DynamicForm
  },
  created() {
    this.viewTemplate();
    this.getHeaderFooter();
  }
};
</script>

<style>
.header_footer:hover{
  box-shadow: 0 1rem 3rem rgba(19, 24, 44, 0.175) !important;
  transition: all .3s ease-in-out;
  cursor: pointer;
}
input[type=radio] {
  opacity: 0
}
input[type=radio]:checked + label>.card{
  background: #0bbae6;
  color: white;
}
</style>
