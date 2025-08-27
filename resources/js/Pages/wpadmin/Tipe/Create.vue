<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../../Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const form = useForm({
    tipe: null,
})

</script>
<template>
    <div>
        <main id="main" class="main">


            <section class="section">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <Link href="/wp-admin/tipe/index"
                                        class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                    <h5 class="card-title">Tipe Create</h5>
                                </div>
                                <form @submit.prevent="form.post('/wp-admin/tipe/create')">
                                    <div class="form-floating mb-3">
                                        <input v-model="form.tipe" type="text"
                                            class="form-control" :class="{ 'is-invalid': form.errors.tipe }" id="tipe"
                                            placeholder="Tipe">
                                        <label for="tipe">Tipe</label>
                                        <div class="invalid-feedback" v-if="form.errors.tipe">
                                            {{ form.errors.tipe }}
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>


                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </main>
    </div>
</template>
