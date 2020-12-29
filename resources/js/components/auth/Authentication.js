export default function (Vue) {
    Vue.auth = {
        setToken(token, expiration) {
            localStorage.setItem('token', token)
            localStorage.setItem('expiration', expiration)       
        },
        userInformation(name, email, photo, id) {
            localStorage.setItem('name', name)
            localStorage.setItem('email', email)
            localStorage.setItem('photo', photo)
            localStorage.setItem('id', id)
        },
        getToken() {
            let token = localStorage.getItem('token')
            let expiration = localStorage.getItem('expiration')

            if (!token || !expiration)
                return null
            
            if (Date.now() > parseInt(expiration)) {
                this.destroyToken()
                return null
            }
            else {
                return token
            }
        },
        destroyToken() {
            localStorage.clear()
        },
        isAuthenticated() {
            if (this.getToken()) {
                return true
            }
            else {
                return false
            }
        }
    }

    Object.defineProperties(Vue.prototype, {
        $authenticate: {
            get: () => {
                return Vue.auth
            }
        }
    })
}