<template>
  <tr class="v-middle" data-id="7">
    <!-- <td>
      <label class="ui-check m-0">
        <input type="checkbox" name="id" value="7" />
        <i></i>
      </label>
    </td> -->
    <td style="min-width:30px;text-align:center">
      <small class="text-muted">{{data_index+1}}</small>
    </td>
    <td class="flex">
      <a href="#" class="item-company ajax h-1x">{{user.name}}</a>
      <div class="item-mail text-muted h-1x d-none d-sm-block">{{user.email}}</div>
    </td>
    <td>
      <span class="item-date text-muted text-sm d-none d-md-block">{{ user.last_login }}</span>
    </td>
    <td>
      <span v-if="user.status == 'verified'" class="item-badge badge text-uppercase bg-success">{{ user.status }}</span>
      <span v-else class="item-badge badge text-uppercase bg-warning">{{ user.status }}</span>
    </td>
    <td class="no-wrap">
      <div class="item-date text-muted text-sm d-none d-md-block">{{ user.updated_at }}</div>
    </td>
    <!-- <td>
      <div class="item-action dropdown">
        <a href="#" data-toggle="dropdown" class="text-muted">
          <i data-feather="more-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
          <a class="dropdown-item" href="#">See detail</a>
          <a class="dropdown-item download">Download</a>
          <a class="dropdown-item edit">Edit</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item trash">Delete item</a>
        </div>
      </div>
    </td> -->
  </tr>
</template>

<script>
export default {
    props: ['user', 'data_index']
};
</script>

<style>
</style>