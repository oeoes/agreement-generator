<template>
  <div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
      <div class="page-hero page-container" id="page-hero">
        <div class="padding d-flex">
          <div class="page-title">
            <h2 class="text-md text-highlight">Template</h2>
            <small class="text-muted">Manage your templates.</small>
          </div>
          <div class="flex"></div>
        </div>
      </div>
      <div class="page-content page-container" id="page-content">
        <div class="padding">
          <div class="form-group">
            <label>Template name</label>
            <div class="row">
              <div class="col-md-4">
                <input v-model="template_name" type="text" class="form-control" width="50%" value />
              </div>
            </div>
          </div>

          <!-- CKEditor -->
          <div id="toolbar-container"></div>

          <div class="document-editor">
            <div class="document-editor__toolbar"></div>
            <div class="document-editor__editable-container">
              <div v-html="content" @blur="onInputUpdate" id="doc_editor" class="document-editor__editable">
                
              </div>              
            </div>
          </div>

          <!-- <editor v-model="content" :init="{plugins: 'lists', toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help', height: 580}"></editor> -->
          <!-- <ckeditor id="myeditor" v-model="content" :editor="editor" :config="editorConfig"></ckeditor> -->
          <div class="form-group mt-3">
            <button v-if="content && template_name" @click="updateTemplate" class="btn btn-primary">Update Template</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ############ Main END-->
  </div>
</template>

<script>
import axios from "axios";
import Editor from "@tinymce/tinymce-vue";

export default {
  data() {
    return {
      template_name: "",
      content: localStorage.getItem('content')
    };
  },
  components: {
    editor: Editor
  },
  methods: {
    currentTemplate() {
      // remove previous html content
      localStorage.removeItem('content')
      
      axios
        .get(`api/templates/view/${this.$route.params.id}`)
        .then(response => {
          this.template_name = response.data.template_name;
          localStorage.setItem('content', response.data.content)     
          console.log(response.data.content);
                    
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateTemplate() {
      axios({
        method: "put",
        url: `api/templates/${this.$route.params.id}`,
        data: {
          template_name: this.template_name,
          content: this.content,
          id: localStorage.getItem('id')
        }
      })
        .then(response => {
          if(!response.data.status) {
            alert(response.data.message)
          }else{
            alert(response.data.message);
            this.$router.push({ name: "template_collections" });
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    onInputUpdate(teks) {
      this.$forceUpdate()
      this.content = teks.target.innerHTML
    }
  },
  created() {
    this.currentTemplate()    
    // console.log(this.$editor.getCKeditor());
  },
  mounted() {
    if(localStorage.getItem('reloaded')){
      localStorage.removeItem('reloaded')
    }else{
      localStorage.setItem('reloaded', '1')
      this.$router.go()
    }
  }
};
</script>

<style>
</style>
