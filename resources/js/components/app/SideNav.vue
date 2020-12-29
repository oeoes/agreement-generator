<template>
  <ul class="nav bg">
    <li class="nav-header hidden-folded">
      <span class="text-muted">Dashboard</span>
    </li>
    <router-link tag="li" :to="{name: 'user'}">
      <a>
        <span class="nav-icon">
          <i data-feather="users"></i>
        </span>
        <span class="nav-text">Users</span>
      </a>
    </router-link>
    <router-link tag="li" :to="{name: 'doc'}">
      <a>
        <span class="nav-icon">
          <i data-feather="clipboard"></i>
        </span>
        <span class="nav-text">Docs</span>
      </a>
    </router-link>
    <router-link tag="li" :to="{name: 'template'}">
      <a>
        <span class="nav-icon">
          <i data-feather="book"></i>
        </span>
        <span class="nav-text">Create Template</span>
      </a>
    </router-link>
    <router-link tag="li" :to="{name: 'template_collections'}">
      <a>
        <span class="nav-icon">
          <i data-feather="bookmark"></i>
        </span>
        <span class="nav-text">Template Collections</span>
      </a>
    </router-link>
    <router-link tag="li" :to="{name: 'custom_header_footer'}">
      <a>
        <span class="nav-icon">
          <i data-feather="layers"></i>
        </span>
        <span class="nav-text">Custom Header & footer</span>
      </a>
    </router-link>

    <router-link tag="li" :to="{name: 'activity_log'}">
      <a>
        <span class="nav-icon">
          <i data-feather="settings"></i>
        </span>
        <span class="nav-text">Activity Log</span>
      </a>
    </router-link>
  </ul>
</template>

<script>
export default {};
</script>

<style>
</style>