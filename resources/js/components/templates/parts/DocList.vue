<template>
  <tr class="v-middle" data-id="7">
    <td></td>
    <td style="min-width:30px;text-align:center">
      <small class="text-muted">{{ doc.id }}</small>
    </td>
    <td class="flex">
      <router-link :to="`/view/doc/${doc.id}`" class="item-company">{{ doc.file_name }}</router-link>
      <div class="item-mail text-muted h-1x d-none d-sm-block">File name: {{ doc.real_name }}</div>
    </td>
    <td style="width: 15px">
      <span class="item-amount d-none d-sm-block text-sm">
        <button @click="download_from_storage" id="downloadStorage" class="btn btn-rounded btn-info">Download</button>
      </span>
    </td>
  </tr>
</template>

<script>
import axios from "axios";

export default {
  props: ["doc"],
  methods: {
    download_from_storage() {
      $('#downloadStorage').html('Download...')
      axios({
        method: "post",
        url: "api/download/storage",
        responseType: "arraybuffer",
        data: {
          file_name: this.doc.real_name,
          user_id: localStorage.getItem('id')
        }
      })
        .then(response => {
          let blob = new Blob([response.data], {
            type: "application/pdf"
          });
          let link = document.createElement("a");
          link.href = window.URL.createObjectURL(blob);
          link.download = this.doc.real_name;
          document.body.appendChild(link);
          link.click();
        })
        .catch(error => {
          alert("Error occured or maybe the file has been deleted.");
        })
        .finally(response => {
          $('#downloadStorage').html('Download')
        })
    }
  }
};
</script>

<style>
</style>