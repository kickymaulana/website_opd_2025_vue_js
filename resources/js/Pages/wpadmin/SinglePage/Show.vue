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

const form = useForm({})

onMounted(() => {
    window.setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.style.transition = 'opacity 500ms, height 200ms';
            alert.style.opacity = '0';
            alert.style.height = '0';

            // Menghapus elemen setelah animasi selesai
            alert.addEventListener('transitionend', function() {
                alert.remove();
            });
        });
    }, 2000);
    console.log(props.list_tema);
});

</script>
<template>
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body position-relative">
                            <!-- Menu dot di pojok kanan atas -->
                            <div class="dropdown position-absolute top-0 end-0 mt-2 me-2">
                                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><Link class="dropdown-item" :href="`/wp-admin/single-page/${single_page.id}/edit`">Edit</Link></li>

                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#hapus">Hapus</a>
                                    </li>
                                </ul>
                                <!-- modal ada disini semua -->
                                <div class="modal fade" id="hapus" tabindex="-1" aria-hidden="true"
                                    style="display: none;" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                apakah anda yakin ingin menghapus data <b>{{ single_page.nama }}</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary"
                                                    @click="form.delete(`/wp-admin/single-page/${single_page.id}/delete`)" data-bs-dismiss="modal">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <Link href="/wp-admin/single-page/index"
                                    class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</Link>
                                <h5 class="card-title">Detail Single Page</h5>
                            </div>
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" v-if="$page.props.flash.message">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ $page.props.flash.message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <form wire:submit="update">
                                <div class="form-floating mb-3">
                                    <p class="form-control bg-light">{{ single_page.nama }}</p>
                                    <label for="nama">Nama</label>
                                </div>

                                <br>
                                <br>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
</template>
