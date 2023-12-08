<template>
    <section id="register">
        <div class="container mx-4 mx-lg-0">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5 register-form p-5">
                    <div class="register-header">Regisztráció</div>
                    <div class="mb-4">
                        <input-component
                            :placeholder="placeHolderRandomName"
                            label="név"
                            v-model="form.name"
                        ></input-component>
                        <error-component
                            :message="errors.name"
                        ></error-component>
                    </div>
                    <div class="mb-4">
                        <input-component
                            placeholder="pl@pl.hu"
                            label="email"
                            v-model="form.email"
                        ></input-component>
                        <error-component
                            :message="errors.email"
                        ></error-component>
                    </div>
                    <div class="mb-4">
                        <input-component
                            label="jelszó"
                            type="password"
                            placeholder="********"
                            v-model="form.password"
                        ></input-component>
                        <error-component
                            :message="errors.password"
                        ></error-component>
                    </div>
                    <div class="mb-4">
                        <input-component
                            label="jelszó újra"
                            type="password"
                            placeholder="********"
                            v-model="form.password_confirmation"
                        ></input-component>
                        <error-component
                            :message="errors.password"
                        ></error-component>
                    </div>
                    <select-team-component :team_id="form.team_id"></select-team-component>
                    <div class="mb-4 text-center">
                        <button @click="register">regisztráció</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { onMounted } from "vue";
import useRegister from "../../composables/register";
export default {
    name: "RegisterPage",
    setup() {
        const {
            form,
            placeHolderRandomName,
            route,
            errors,
            register,
            randomName,
        } = useRegister();
        onMounted(() => {
            randomName();
            form.value.email = route.query.email;
            form.value.team_id = ""
        });
        return {
            form,
            placeHolderRandomName,
            errors,
            register,
        };
    },
};
</script>
