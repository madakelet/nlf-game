<template>
    <section id="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-10 my-auto">
                    <div class="mb-3 w-50 mx-auto">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="e-mail"
                        />
                    </div>
                    <div class="mb-3 w-50 mx-auto">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="jelszó"
                        />
                    </div>
                    <div class="mb-3 w-50 mx-auto text-center">
                        <button class="text-center">
                            bejelentkezés
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    name: "LoginPage",
};
</script>
