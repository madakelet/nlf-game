<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-10" v-for="form in forms" :key="form.id">
                <form-component :form="form"/>
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted } from 'vue';
import useForm from '../../composables/form'
export default {
    name: "Forms",
    setup() {
        const { forms, loading, getForms } = useForm();
        onMounted( async () => {
            await getForms();
        });
        return {
            forms,
            loading
        };
    },
}
</script>