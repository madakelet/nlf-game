<template>
    <section id="users">
        <div class="container">
            <div class="row my-3">
                <div class="col-lg-2 col-6 my-auto">
                    <div class="fs-2">felhasználók</div>
                </div>
                <div class="col-lg-2 col-6 my-auto">
                    <button
                        @click="toggleSendInvitation = !toggleSendInvitation"
                    >
                        új meghívó
                    </button>
                </div>
                <div class="col-lg-4 col-10">
                    <alert-component message="sikeresen elküldtük a megihvót" v-if="success"></alert-component>
                </div>
            </div>
            <div class="row my-3" v-if="toggleSendInvitation">
                <div class="col-lg-4 col-9 my-auto">
                    <input-component
                        v-model="email"
                        label="email cím"
                        :hasLabel="true"
                        :loading="loading"
                    ></input-component>
                    <error-component :message="errors.email"></error-component>
                </div>
                <div class="col-lg-2 col-3 my-auto">
                    <button :disabled="loading" @click="sendInvitation">
                        küldés
                    </button>
                </div>
                <div class="col-12 mt-3" align="center" v-if="loading">
                    <loading-spinner></loading-spinner>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { ref, onMounted, watch } from "vue";
import useUser from "../../composables/user";
export default {
    name: "Users",
    setup() {
        const {
            users,
            email,
            loading,
            errors,
            success,
            toggleSendInvitation,
            sendInvitation,
            getUsers,
        } = useUser();
        onMounted(async () => {
            await getUsers();
        });

        watch(email, () => {
            errors.value.email = "";
        });
        return {
            users,
            toggleSendInvitation,
            email,
            loading,
            errors,
            success,
            sendInvitation,
        };
    },
};
</script>
