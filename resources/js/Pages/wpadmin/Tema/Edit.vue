<script setup>
import AppLayout from '../../../Layouts/AppLayout.vue'
import { ref, onMounted, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const props = defineProps({
    tema: Object,
});

const form = useForm({
    tema: props.tema.tema,
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
                                <Link :href="`/wp-admin/tema/${tema.id}/show`" class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                <h5 class="card-title">Edit Tema</h5>
                            </div>
                            <form @submit.prevent="form.patch(`/wp-admin/tema/${tema.id}/edit`)">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control" :class="{ 'is-invalid': form.errors.tema }" id="tema"
                                        placeholder="Tema" v-model="form.tema" />
                                    <label for="tema">Tema</label>
                                        <div class="invalid-tooltip" v-if="form.errors.tema">
                                            {{ $form.errors.tema }}
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
