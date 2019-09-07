<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <router-link tag="li" :to="{name: 'home'}">
            <a class="nav-link">Home</a>
        </router-link>
        <router-link tag="li" :to="{name: 'storage'}">
            <a class="nav-link">Storage</a>
        </router-link>
    </ul>
  </div>
</nav>
</template>

<script>
export default {

}
</script>