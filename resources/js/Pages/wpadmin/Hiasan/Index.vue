<script setup>
import AppLayout from '../../../Layouts/AppLayout.vue'
import { ref, onMounted, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const props = defineProps({
    list_hiasan: Object,
    cari: String,
    tema: Object,
});


const cari = ref('');

watch(cari, (nilaibaru, nilaiawal) => {
    router.get(`/wp-admin/hiasan/${props.tema.id}/index`, { cari: nilaibaru }, { preserveState: true, replace: true });
});

// Fungsi untuk membuat URL pagination dengan parameter cari
const getPaginationUrl = (url) => {
    if (!url) return '#';

    // Jika ada parameter cari, tambahkan ke URL pagination
    if (cari.value) {
        const separator = url.includes('?') ? '&' : '?';
        return `${url}${separator}cari=${encodeURIComponent(cari.value)}`;
    }

    return url;
};


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
});


</script>
<template>
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hiasan</h5>

                            <div class="d-flex justify-content-between">
                                <div class="col-md-2">
                                    <input type="text" class="form-control"
                                        id="cari" placeholder="Cari data" v-model="cari">
                                </div>
                                <div class="d-flex">
                                    <Link :href="`/wp-admin/hiasan/${props.tema.id}/create`" class="btn btn-primary btn-sm">Tambah</Link>
                                </div>
                            </div>


                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" v-if="$page.props.flash.message">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ $page.props.flash.message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>



                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Hiasan</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in list_hiasan.data" :key="index">
                                        <td>{{ item.nama }}</td>
                                        <td class="text-end">
                                            <Link :href="`/wp-admin/hiasan/${ tema.id }/${item.id}/edit`" class="btn btn-primary"><i class="bi bi-info-square"></i></Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item" :class="{
                                        'active' : link.active,
                                        'disabled' : !link.url
                                    }" aria-current="page" v-for="link in list_hiasan.meta.links" :key="link.label">
                                        <Link class="page-link" :href="getPaginationUrl(link.url)">
                                            <span v-html="link.label"></span>
                                        </Link>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
</template>
