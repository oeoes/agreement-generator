<template>
    <tr class="v-middle" :data-id="list.id">
        <td>
        </td>
        <td style="min-width:30px;text-align:center">
            <small class="text-muted">{{ list.id }}</small>
        </td>
        <td class="flex">
            <router-link :to="`/view/${list.id}`" class="item-company">
                {{ list.template_name }}
            </router-link>
            <div class="item-mail text-muted h-1x d-none d-sm-block">
                Field:
                <span v-for="field in data" :key="field">{{ field }},</span>
            </div>
        </td>
        <td style="width: 15px">
            <span class="item-amount d-none d-sm-block text-sm">
                <router-link :to="`/update/${list.id}`" class="btn btn-rounded btn-primary">Update</router-link>
            </span>
        </td>
        <td style="width: 15px">
            <span class="item-amount d-none d-sm-block text-sm">
                <div @click="$emit('get-id')" data-target="#confirmModal" data-toggle="modal" class="btn btn-rounded btn-danger">Delete</div>
            </span>
            <!-- modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Warning!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="h4">Hapus template?</div>
                  </div>
                  <div class="modal-footer">
                    <button @click="$emit('delete-template')" type="button" class="btn btn-primary" data-dismiss="modal">Ya</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of modal -->
        </td>
    </tr>
</template>

<script>
import axios from 'axios'
    export default {
        props: ["list"],
        data() {
            return {
                data: JSON.parse(this.list.field),
            };
        }
    };

</script>

<style>
</style>
