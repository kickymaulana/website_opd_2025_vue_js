<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../../Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

defineOptions({ layout: AppLayout })

const props = defineProps({
    tema: Object,
});

const form = useForm({
    hiasan: null,
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
                            <form wire:submit="simpan">
                                <div class="form-floating mb-3">
                                    <input wire:model="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Nama">
                                    <label for="nama">Nama</label>
                                    @error('nama')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control @error('hiasan') is-invalid @enderror"
                                        id="editor" placeholder="Hiasan" wire:model="hiasan"
                                        x-data
                                        x-init="

                                        // Tunggu hingga Livewire siap
                                        $nextTick(() => {
                                        // Inisialisasi editor
                                        editAreaLoader.init({

                                        id : 'editor'		// textarea id
                                        ,syntax: 'html'			// syntax to be uses for highgliting
                                        ,start_highlight: true		// to display with highlight mode on start-up
                                        ,fullscreen: false
                                        ,toolbar: 'fullscreen, search, go_to_line, syntax_selection, |, undo, redo, |, select_font,|, change_smooth_selection, highlight, reset_highlight, word_wrap, |, help'
                                        ,replace_tab_by_spaces: 2
                                        ,allow_toggle: false
                                        ,min_height:400
                                        ,font_size:12
                                        ,gecko_spellcheck: true
                                        ,replace_tab_by_spaces: 2
                                        ,font_family: 'verdana',
                                        });

                                        // Set nilai awal jika ada
                                        if ($wire.get('hiasan')) {
                                        editAreaLoader.setValue('editor', $wire.get('hiasan'));
                                        }

                                        // Update Livewire saat konten berubah
                                        const updateLivewire = () => {
                                        $wire.set('hiasan', editAreaLoader.getValue('editor'), false);
                                        };

                                        // Tambahkan event listeners
                                        const editorEl = document.getElementById('editor');
                                        editorEl.addEventListener('keyup', updateLivewire);
                                        editorEl.addEventListener('blur', updateLivewire);
                                        editorEl.addEventListener('change', updateLivewire);

                                        // Juga update saat toolbar digunakan
                                        setInterval(updateLivewire, 1000);
                                        });
                                        "

                                    ></textarea>
                                    @error('hiasan')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input wire:model="urutan" type="number"
                                                class="form-control @error('urutan') is-invalid @enderror" id="urutan"
                                                placeholder="Urutan">
                                            <label for="urutan">Urutan</label>
                                            @error('urutan')
                                            <div class="invalid-tooltip">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" wire:model="tipe_id">
                                                <option value="kosong">Belum Pilih</option>
                                                <option value="#">#</option>
                                            </select>
                                            <label class="col-form-label">Tipe</label>
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



                            <livewire:wpadmin.berkasnesting.berkas-create />
                            <livewire:wpadmin.berkasnesting.berkas-index />

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

</template>
