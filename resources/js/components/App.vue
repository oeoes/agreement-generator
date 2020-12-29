<template>
  <component :is="layout">
    <router-view></router-view>
  </component>
</template>
<script>
import DefaultNav from './templates/barnav/DefaultNav'
import LoginLayout from './templates/barnav/LoginLayout'

export default {
  data() {
    return {
      default: "default"
    };
  },
  components: {
    'default-layout': DefaultNav,
    'login-layout': LoginLayout
  },
  computed: {
    layout() {
      return (this.$route.meta.layout || this.default) + "-layout";
    }
  }
};
</script>