<script setup>
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
const form = useForm({
    username: null,
    password: null,
})

</script>
<template>
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo d-flex align-items-center w-auto">
                                    <img src="../../../../public/NiceAdmin/assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Website OPD 2025</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">


                                    <div class="pt-4 pb-2">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="$page.props.flash.message">
                                            {{ $page.props.flash.message }}
                                            <button type="button" class="btn-close" aria-label="Close" @click="$page.props.flash.message = null"></button>
                                        </div>
                                    </div>

                                    <form class="row g-3" novalidate @submit.prevent="form.post('/wp-admin/login')">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" :class="{ 'is-invalid': form.errors.username }" id="yourUsername" required v-model="form.username">
                                                <div class="invalid-feedback" v-if="form.errors.username">
                                                    {{ form.errors.username }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" :class="{ 'is-invalid': form.errors.password }" id="yourPassword" required v-model="form.password">
                                            <div class="invalid-feedback" v-if="form.errors.password">
                                                {{ form.errors.password }}
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 mt-3" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</template>
