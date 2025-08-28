<script setup>
import AppLayout from '../../../Layouts/AppLayout.vue'
import { ref, onMounted, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const props = defineProps({
    single_page: Object,
});

const form = useForm({
    nama: props.single_page.nama,
})

</script>
<template>
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <Link :href="`/wp-admin/single-page/${single_page.id}/show`" class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                <h5 class="card-title">Edit Single Page</h5>
                            </div>
                            <form @submit.prevent="form.patch(`/wp-admin/single-page/${single_page.id}/edit`)">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control" :class="{ 'is-invalid': form.errors.tipe }" id="nama"
                                        placeholder="Nama" v-model="form.nama" />
                                    <label for="nama">Nama</label>
                                        <div class="invalid-tooltip" v-if="form.errors.nama">
                                            {{ $form.errors.nama }}
                                        </div>
                                </div>

                                <br>
                                <br>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>


                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
</template>
