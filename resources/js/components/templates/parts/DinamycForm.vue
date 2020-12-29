<template>
  <span>
    <div class="form-group">
      <label>{{ label.toUpperCase() }}</label>
      <input v-model="form.field[field_name]" type="text" class="form-control" />
    </div>
  </span>
</template>

<script>
export default {
  props: ["label", "field_name",],
  data() {
      return {
          form: {
              field: []
          }
      }
  },
  mounted() {
      console.log(this.form);      
  }
};
</script>

<style>
</style>