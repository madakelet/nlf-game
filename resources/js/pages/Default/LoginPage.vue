<template>
    <section id="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-10" align="center" v-if="loading">
                    <loading-spinner />
                </div>
                <div class="col-lg-4 col-10 my-auto text-center" v-if="!loading">
                    <img :src="`${baseUrl}/storage/images/nfl-transparent-logo-rgb.png`" class="img-fluid mb-3" height="auto" width="150px"/>
                    <div class="mb-3 mx-auto">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="e-mail"
                            v-model="form.email"
                            @keyup.enter="login"
                        />
                        <div
                            class="alert alert-danger mt-3"
                            role="alert"
                            v-if="errors.email"
                        >
                            {{ errors.email[0] }}
                        </div>
                    </div>
                    <div class="mb-3 mx-auto">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="jelszó"
                            v-model="form.password"
                            @keyup.enter="login"
                        />
                        <div
                            class="alert alert-danger mt-3"
                            role="alert"
                            v-if="errors.password"
                        >
                            {{ errors.password[0] }}
                        </div>
                        <div
                            class="alert alert-danger mt-3"
                            role="alert"
                            v-if="errors.message"
                        >
                            {{ errors.message[0] }}
                        </div>
                    </div>
                    <div class="mb-3 mx-auto text-center">
                        <button class="text-center" @click="login">
                            bejelentkezés
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { watch } from "vue";
import useLogin from "../../composables/login";
import useDefault from "../../composables/default";
export default {
    name: "LoginPage",
    setup() {
        const { login, form, loading, errors } = useLogin();
        const { baseUrl } = useDefault();
        watch(
            () => form.value.email,
            () => {
                errors.value = [];
            }
        );
        watch(
            () => form.value.password,
            () => {
                errors.value = [];
            }
        );
        return { login, loading, form, errors, baseUrl };
    },
};
</script>
