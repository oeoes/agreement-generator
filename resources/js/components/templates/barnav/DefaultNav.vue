<template>
  <span class="layout-row">
    <side-bar></side-bar>
    <div id="main" class="layout-column flex">
      <header-menu></header-menu>

      <slot></slot>
    </div>
  </span>
</template>

<script>
import Header from "../../app/Header";
import SideBar from "../../app/SideBar";

export default {
  components: {
    "header-menu": Header,
    "side-bar": SideBar
  }
};
</script>

<style>
</style>