<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../../Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const form = useForm({
    nama: null,
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
                                    <Link href="/wp-admin/single-page/index"
                                        class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                    <h5 class="card-title">Single Page Create</h5>
                                </div>
                                <form @submit.prevent="form.post('/wp-admin/single-page/create')">
                                    <div class="form-floating mb-3">
                                        <input v-model="form.nama" type="text"
                                            class="form-control" :class="{ 'is-invalid': form.errors.nama }" id="nama"
                                            placeholder="Nama">
                                        <label for="nama">Nama</label>
                                        <div class="invalid-feedback" v-if="form.errors.nama">
                                            {{ form.errors.nama }}
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
