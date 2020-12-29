<template>
  <div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
      <div class="page-hero page-container" id="page-hero">
        <div class="padding d-flex">
          <div class="page-title">
            <h2 class="text-md text-highlight">{{ data_doc.doc.file_name }}</h2>
            <small class="text-muted">Created at: {{ data_doc.doc.created_at }}</small>
          </div>
          <div class="flex"></div>
        </div>
      </div>
    </div>


    <div class="page-content page-container" id="page-content">
        <div class="padding">
          <iframe src="https://pdfs.semanticscholar.org/a9fd/ac913234c640c538078029cc59b0125d1efe.pdf" frameborder="0" width="100%" height="400px"></iframe>
          <!-- <embed :src="data_doc.file" type="application/pdf"> -->
        </div>
    </div>
    <!-- ############ Main END-->
  </div>
</template>

<script>
import axios from "axios"

export default {
  data() {
    return {
      data_doc: []
    };
  },
  methods: {
    viewDocs() {
      axios({
        method: "post",
        url: "api/view/doc",
        data: {
          id: this.$route.params.id
        }
      })
        .then(response => {
          this.data_doc = response.data     
            console.log(response.data);            
        })
        .catch(error => {
          alert("Something went wrong");
        });
    }
  },
  created() {
    this.viewDocs();
  },
  components: {

  }
};
</script>

<style>
</style>
