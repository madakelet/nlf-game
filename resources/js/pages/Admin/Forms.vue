<template>
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-2 col-4 my-auto">
                <div class="fs-2">
                    formok
                </div>
            </div>
            <div class="col-lg-2 col-3 my-auto">
                <button @click="redirect('CreateForm')">új form</button>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12" v-for="form in forms" :key="form.id">
                <form-component :form="form"/>
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted } from 'vue';
import useForm from '../../composables/form'
import useDefault from '../../composables/default';
export default {
    name: "Forms",
    setup() {
        const { forms, loading, getForms } = useForm();
        const { redirect } = useDefault();
        onMounted( async () => {
            await getForms();
        });
        return {
            forms,
            loading,
            redirect,
        };
    },
}
</script>