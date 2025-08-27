<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../../Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const props = defineProps({
    tema: Object,
    tipe: Array,
});

const form = useForm({
    nama: null,
    hiasan: null,
    tipe_id: 'kosong',
    urutan: null,
})

</script>
<template>
    <main id="main" class="main">


        <section class="section">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <Link :href="`/wp-admin/hiasan/${props.tema.id}/index`"
                                    class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                <h5 class="card-title">Hiasan Create </h5>
                            </div>
                            <form @submit.prevent="form.post(`/wp-admin/hiasan/${props.tema.id}/create`)">
                                <div class="form-floating mb-3">
                                    <input v-model="form.nama" type="text"
                                        class="form-control" :class="{ 'is-invalid': form.errors.nama }" id="nama"
                                        placeholder="Nama">
                                    <label for="nama">Nama</label>
                                    <div class="invalid-feedback" v-if="form.errors.nama">
                                        {{ form.errors.nama }}
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" :class="{ 'is-invalid': form.errors.hiasan }"
                                        id="editor" placeholder="Hiasan" v-model="form.hiasan"
                                    ></textarea>
                                    <label for="editor">Hiasan</label>
                                    <div class="invalid-feedback" v-if="form.errors.hiasan">
                                        {{ form.errors.hiasan }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input v-model="form.urutan" type="number"
                                                class="form-control" :class="{ 'is-invalid': form.errors.urutan }"
                                                placeholder="Urutan">
                                            <label for="urutan">Urutan</label>
                                            <div class="invalid-feedback" v-if="form.errors.urutan">
                                                {{ form.errors.urutan }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Pilih" v-model="form.tipe_id" :class="{ 'is-invalid': form.errors.tipe_id }">
                                                <option value="kosong" selected>Belum Pilih</option>
                                                <option :value="item.id" v-for="(item, index) in props.tipe" :key="item.id">{{ item.tipe }}</option>
                                            </select>
                                            <label class="col-form-label">Tipe</label>
                                            <div class="invalid-feedback" v-if="form.errors.tipe_id">
                                                {{ form.errors.tipe_id }}
                                            </div>
                                        </div>


                                    </div>
                                </div>



                                <br>
                                <br>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>


                        </div>
                    </div>



                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Berkas</h5>



                            <!-- berkas nesting create -->
                            <!-- berkas nesting index -->

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

</template>
