<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../../Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const form = useForm({
    tema: null,
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
                                    <Link href="/wp-admin/tema/index"
                                        class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                    <h5 class="card-title">Tema Create</h5>
                                </div>
                                <form wire:submit="simpan">
                                    <div class="form-floating mb-3">
                                        <input wire:model="tema" type="text"
                                            class="form-control @error('tema') is-invalid @enderror" id="tema"
                                            placeholder="Tema">
                                        <label for="tema">Tema</label>
                                        <div class="invalid-tooltip" v-if="form.errors.tema">
                                            {{ $message }}
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
