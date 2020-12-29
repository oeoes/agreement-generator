<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card mt-5 p-3 border-0 shadow">
          <!-- <img style="width: 100%"
          src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI0NTBweCIgaGVpZ2h0PSIzN3B4IiB2aWV3Qm94PSIwIDAgNDUwIDM3IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPiAgICAgICAgPHRpdGxlPmhlYWRlcjwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz4gICAgICAgIDxwb2x5Z29uIGlkPSJwYXRoLTEiIHBvaW50cz0iNC41IDkgOCAxNiAxIDE2Ij48L3BvbHlnb24+ICAgIDwvZGVmcz4gICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0iaGVhZGVyIj4gICAgICAgICAgICA8ZyBpZD0ibG9nby1jb2xvciIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDIxLjAwMDAwMCwgNC4wMDAwMDApIiBmaWxsPSIjMjQzNzc4Ij4gICAgICAgICAgICAgICAgPGcgaWQ9IkxvZ28tQ29weSI+ICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNNy45MDkwOTA5MSwwIEwxNi4xNTUwMTYyLDAgTDI5LDI5IEwyMC43NTQwNzQ3LDI5IEw3LjkwOTA5MDkxLDAgWiBNNi41ODk0MTk2MiwxNS44MTgxODE4IEwxMy4xODE4MTgyLDI5IEwwLDI5IEw2LjU4OTQxOTYyLDE1LjgxODE4MTggWiIgaWQ9IkNvbWJpbmVkLVNoYXBlIj48L3BhdGg+ICAgICAgICAgICAgICAgIDwvZz4gICAgICAgICAgICA8L2c+ICAgICAgICAgICAgPGcgaWQ9IkFudGlncmF2aXR5LWJsdWUiPiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNOC4zNzA3NzUzNiwzNyBMNi45MTkxMTQ1NiwzNyBDMy4wMzk3MDk5NywzNi42MTk0NTM1IDAsMzMuMTA4NzAzNCAwLDI4LjgyNzQwOTkgQzAsMjQuMjcyNzc0OSAzLjIyMTkwODc0LDIwLjYwMTgzMjUgNy42MTk0OTM3NCwyMC42MDE4MzI1IEMxMC4zNjcyNzU0LDIwLjYwMTgzMjUgMTIuMjgxMzY0OSwyMS42Mzk5MjkyIDEzLjY0NjQ2NTEsMjMuMzExNTk1MyBMMTEuMzE0OTYyNCwyNS45MDYyNjczIEMxMC40MDUyNzM3LDI0LjQyNjYwOTIgOS4yMTE0NDksMjMuODY5Mzg3MSA3LjgyNzYzMzI0LDIzLjg2OTM4NzEgQzUuNjI5NDA3ODgsMjMuODY5Mzg3MSAzLjg0NzQ2MTUyLDI2LjA3OTQ3MzQgMy44NDc0NjE1MiwyOC44Mjc0MDk5IEMzLjg0NzQ2MTUyLDMxLjUxODM3MDggNS42Mjk0MDc4OCwzMy43MDkwODUzIDcuODI3NjMzMjQsMzMuNzA5MDg1MyBDOS41MzM1ODMxNiwzMy43MDkwODUzIDExLjIyMDI1MDQsMzIuNTk0NjQxMiAxMS4yMjAyNTA0LDMwLjY1MzQ4MDEgTDcuNjE5NDkzNzQsMzAuNjUzNDgwMSBMNy42MTk0OTM3NCwyNy44NjY4MDAxIEwxNC44NDAyODk3LDI3Ljg2NjgwMDEgTDE0Ljg0MDI4OTcsMzEuMzA2OTkxMSBDMTQuMDU2NjEwNSwzNC45OTc0NTE5IDExLjIwOTExNzMsMzYuNzQxMDU1OCA4LjM3MDc3NTM2LDM3IFogTTUxLjM4ODkwNTYsMCBMNTEuMzg4OTA1NiwxNS44NTU3NTkyIEw0Ny44MjU1ODAxLDE1Ljg1NTc1OTIgTDQ3LjgyNTU4MDEsMCBMNTEuMzg4OTA1NiwwIFogTTQ1LjIxODQ0ODUsMCBMNDUuMjE4NDQ4NSwzLjE3MTI2NTc4IEw0MS41MDM2OTcyLDMuMTcxMjY1NzggTDQxLjUwMzY5NzIsMTUuODU1NzU5MiBMMzcuOTQwMzcxNiwxNS44NTU3NTkyIEwzNy45NDAzNzE2LDMuMTcxMjY1NzggTDM0LjIyNTYyMDMsMy4xNzEyNjU3OCBMMzQuMjI1NjIwMywwIEw0NS4yMTg0NDg1LDAgWiBNMzIuNTI4MTc3NCwwIEwzMi41MjgxNzc0LDE1Ljg1NTc1OTIgTDI4Ljk2NDg1MTgsMTUuODU1NzU5MiBMMjIuNzEwNDU4Myw2LjAxNTQ5MTIyIEwyMi43MTA0NTgzLDE1Ljg1NTc1OTIgTDE5LjE0NzY5OTksMTUuODU1NzU5MiBMMTkuMTQ3Njk5OSwwIEwyMi43MTA0NTgzLDAgTDI4Ljk2NDg1MTgsOS44NDAyNjc5NCBMMjguOTY0ODUxOCwwIEwzMi41MjgxNzc0LDAgWiBNMTcuNzMxNTU3MywyMC44OTAxMjk0IEwyMy4zMjI5NjY5LDIwLjg5MDEyOTQgQzI2LjIyMjc0MTUsMjAuODkwMTI5NCAyOC40MjA5NjY5LDIyLjQ4NTQ0ODEgMjguNDIwOTY2OSwyNS41OTg1OTg3IEMyOC40MjA5NjY5LDI3Ljk4MTg5MSAyNy4xMzI0MzAyLDI5LjU3NzIwOTcgMjUuMjE4MzQwOCwzMC4xOTE5NzcyIEwzMC42MDA0NzY3LDM2Ljc0NTg4ODUgTDI2LjA3MDc0ODYsMzYuNzQ1ODg4NSBMMjEuMjk0ODgyOCwzMC40ODAyNzQxIEwyMS4yOTQ4ODI4LDM2Ljc0NTg4ODUgTDE3LjczMTU1NzMsMzYuNzQ1ODg4NSBMMTcuNzMxNTU3MywyMC44OTAxMjk0IFogTTIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBMMjEuNzExNzI5LDI3LjkyNDM0NTUgQzIzLjA1NzU0NjUsMjcuOTI0MzQ1NSAyNC42Njg3ODQ1LDI3LjgyODA1NjcgMjQuNjY4Nzg0NSwyNS44NDg3MjE5IEMyNC42Njg3ODQ1LDIzLjg2OTM4NzEgMjMuMDU3NTQ2NSwyMy43NzMwOTgyIDIxLjcxMTcyOSwyMy43NzMwOTgyIEwyMS4yOTQ4ODI4LDIzLjc3MzA5ODIgTDIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBaIE0zNS4wNjI3MTU0LDM2Ljc0NTg4ODUgTDI4LjUwNDkwMzIsMjAuODkwMTI5NCBMMzIuNTIzMDczMiwyMC44OTAxMjk0IEwzNi40NjUyNDY3LDMxLjMwNjk5MTEgTDQwLjQwNzQyMDIsMjAuODkwMTI5NCBMNDQuNDI1MDIzLDIwLjg5MDEyOTQgTDM3Ljg2Nzc3OCwzNi43NDU4ODg1IEwzNS4wNjI3MTU0LDM2Ljc0NTg4ODUgWiBNNDYuNTA2NDE4LDI0LjA2MTM5NTEgTDQ2LjUwNjQxOCwyMC44OTAxMjk0IEw1Ny40OTkyNDYyLDIwLjg5MDEyOTQgTDU3LjQ5OTI0NjIsMjQuMDYxMzk1MSBMNTMuNzg0NDk0OSwyNC4wNjEzOTUxIEw1My43ODQ0OTQ5LDM2Ljc0NTg4ODUgTDUwLjIyMTE2OTMsMzYuNzQ1ODg4NSBMNTAuMjIxMTY5MywyNC4wNjEzOTUxIEw0Ni41MDY0MTgsMjQuMDYxMzk1MSBaIE01OC40MDA5OTUsMjAuODkwMTI5NCBMNjIuNjg0MDE4MiwyMC44OTAxMjk0IEw2NS45NDM5MjUyLDI1Ljk2MzgxMjggTDY5LjIwMzgzMjEsMjAuODkwMTI5NCBMNzMuNDg3NDIyNSwyMC44OTAxMjk0IEw2Ny43MjUzMDQ0LDI5LjYzNDc1NTIgTDY3LjcyNTMwNDQsMzYuNzQ1ODg4NSBMNjQuMTYyNTQ1OSwzNi43NDU4ODg1IEw2NC4xNjI1NDU5LDI5LjYzNDc1NTIgTDU4LjQwMDk5NSwyMC44OTAxMjk0IFogTTc2LjUxNzA3MTYsMzEuNzk3NTUxNiBDNzcuODk4NjE4OCwzMS43OTc1NTE2IDc5LDMyLjkxNDI3NDcgNzksMzQuMzE1MzA2NCBDNzksMzUuNjk0Njg3NCA3Ny44OTg2MTg4LDM2LjgxMDg0MDggNzYuNTE3MDcxNiwzNi44MTA4NDA4IEM3NS4xNTcwNzU2LDM2LjgxMDg0MDggNzQuMDU1Njk0MywzNS42OTQ2ODc0IDc0LjA1NTY5NDMsMzQuMzE1MzA2NCBDNzQuMDU1Njk0MywzMi45MTQyNzQ3IDc1LjE1NzA3NTYsMzEuNzk3NTUxNiA3Ni41MTcwNzE2LDMxLjc5NzU1MTYgWiIgaWQ9IkNsaXAtMiIgZmlsbD0iIzI0Mzc3OCI+PC9wYXRoPiAgICAgICAgICAgICAgICA8cG9seWdvbiBpZD0iQ2xpcC01IiBmaWxsPSIjMjQzNzc4IiBwb2ludHM9IjEwLjMwMSAwIDE3IDE2IDEyLjY5OSAxNiA2IDAiPjwvcG9seWdvbj4gICAgICAgICAgICAgICAgPG1hc2sgaWQ9Im1hc2stMiIgZmlsbD0id2hpdGUiPiAgICAgICAgICAgICAgICAgICAgPHVzZSB4bGluazpocmVmPSIjcGF0aC0xIj48L3VzZT4gICAgICAgICAgICAgICAgPC9tYXNrPiAgICAgICAgICAgICAgICA8dXNlIGlkPSJDbGlwLTgiIGZpbGw9IiMyNDM3NzgiIHhsaW5rOmhyZWY9IiNwYXRoLTEiPjwvdXNlPiAgICAgICAgICAgIDwvZz4gICAgICAgIDwvZz4gICAgPC9nPjwvc3ZnPg==">-->

          <div class="h2 mb-3 mt-4 text-center">Login</div>
          <div class="form-group mt-3">
            <label>Email</label>
            <input v-model="email" type="email" class="form-control" />
          </div>

          <div class="form-group">
            <label>Password</label>
            <input v-model="password" type="password" class="form-control" />
          </div>
          <div class="form-group">
            <button id="login" @click="login" class="btn btn-primary">Login</button>
          </div>
          <div class="row">
            <div class="col-md-4 text-center">
              <div class="text-muted mb-3">Or login using</div>
              <google :params="params" :renderParams="renderParams" :onSuccess="onSuccess" :onFailure="onFailure">Login</google>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import GoogleLogin from 'vue-google-login'

export default {
  data() {
    return {
      email: "",
      password: "",
      params: {
        client_id: "987875943712-6oujd1leqaontpvp50g4tin2rt60cojp.apps.googleusercontent.com"
      },
      renderParams: {
        width: 250,
        height: 50,
        longtitle: true
      }
    };
  },
  methods: {
    login() {
      $("#login").html("Logging in...");
      let data = {
        client_id: 2,
        client_secret: "v2z5Ubczpw3zwS3o7psfjnZSfJymiuWnBs2z1oc3",
        grant_type: "password",
        username: this.email,
        password: this.password
      };

      axios({
        method: "post",
        url: "oauth/token",
        data: data
      })
        .then(response => { // Login success
        console.log(response);        

          // update last login
          axios({
            method: 'post',
            url: 'api/users/last-login',
            data: {
              email: this.email
            }
          })

          // get user credentials for logged in user using common user
          axios({
            method: 'get',
            url: `api/users/credentials/${this.email}`
          }).then(response => {
            // keep user credentials to loca storage
            this.$authenticate.userInformation(response.data.user.name, response.data.user.email, response.data.user.profile, response.data.user.id);       
          })

          // set token
          this.$authenticate.setToken(
            response.data.access_token,
            response.data.expires_in + Date.now()
          );
          this.$router.go("/user");
        })
        .catch(error => {
          alert("Invalid Credentials");
        })
        .finally(response => {
          $("#login").html("Login");
        });
    },

    onSuccess(googleUser) {            
      var profile = googleUser.getBasicProfile();   
      
      // validate is invited
      axios({
        method: "post",
        url: "api/users/validate",
        data: {
          email: profile.getEmail()
        }
      }).then(response => {
        if (response.data.status) {

          // check if user information is complete
          if (!response.data.complete) {
            axios({
              method: "post",
              url: "api/users/insert",
              data: {
                email: profile.getEmail(),
                name: profile.getName(),
                profile: profile.getImageUrl(),
                id: profile.getId()
              }
            })
              .catch(error => {
                console.log(error);
              });
          }

          // get passport token logged in using gmail
          let data = {
            client_id: 2,
            client_secret: "v2z5Ubczpw3zwS3o7psfjnZSfJymiuWnBs2z1oc3",
            grant_type: "password",
            username: profile.getEmail(),
            password: profile.getId()
          };

          axios({
            method: "post",
            url: "oauth/token",
            data: data
          }).then(response => {
            this.$authenticate.setToken(
              response.data.access_token,
              response.data.expires_in + Date.now()
            );

            // update last login
            axios({
              method: 'post',
              url: 'api/users/last-login',
              data: {
                email: profile.getEmail()
              }
            })
            // ---------- last login sampe sini -----------------

          })
          // ------------------------------


          // get user credentials for logged in user from gmail
          axios({
            method: 'get',
            url: `api/users/credentials/${profile.getEmail()}`
          }).then(response => {
            console.log(response);            
            // keep user credentials to loca storage
            this.$authenticate.userInformation(response.data.user.name, response.data.user.email, response.data.user.profile, response.data.user.id);       
          })

          this.$router.go('/user')
        } else {
          alert(response.data.message);
        }
      });
    },
    
    onFailure(googleUser) {

    }
  },
  components: {
    'google': GoogleLogin
  }
};
</script>

<style>
</style>