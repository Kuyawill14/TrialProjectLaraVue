import axios from "axios";
import router from "../../router";

const state = {
    form: {}
};
const getter = {};
const actions = {
    loginUser({}, form) {
        axios.post("/api/user/login", {
                email: form.email,
                password: form.password
            })
            .then(response => {
                console.log(response.data);
                if (response.data.remember_token) {
                    localStorage.setItem("User_token", response.data.remember_token);
                    localStorage.setItem("app_logo", "./img/bikeLogo.png");
                    localStorage.setItem("user_logo", "./img/usericon.png");
                   
                    router.push({
                        path: 'dashboard'
                    })

                }


            })
    },

    /* saveForm() {
        axios
            .post("/api/user/register", this.form)
            .then(() => {
                console.log("saved");
            })
            .catch((error) => {
                this.errors = error.response.data.errors;
            });
    }, */
};
const mutations = {};

export default {
    namespaced: true,
    state,
    getter,
    actions,
    mutations
}
