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
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#aktifkan">Akfifkan</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#nonaktifkan">Non Akftikan</a>
                                    </li>
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
                                                apakah anda yakin ingin menghapus data <b wire:text="tema"></b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="hapus">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="aktifkan" tabindex="-1" aria-hidden="true"
                                    style="display: none;" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                apakah anda yakin ingin mengaktifkan tema <b wire:text="tema"></b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="aktifkan">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="nonaktifkan" tabindex="-1" aria-hidden="true"
                                    style="display: none;" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                apakah anda yakin ingin menonaktifkan tema <b wire:text="tema"></b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="nonaktifkan">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal ada disini semua -->
                            </div>

                            <div class="d-flex align-items-center">
                                <a wire:navigate href="#"
                                    class="btn btn-primary btn-sm me-2 d-inline-flex align-items-center"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</a>
                                <h5 class="card-title">Detail Tema</h5>
                            </div>
                            <form wire:submit="update">
                                <div class="form-floating mb-3">
                                    <p class="form-control">tema</p>
                                    <label for="tema">Tema</label>
                                </div>

                                <br>
                                <br>

                            </form>
                            <a class="btn btn-primary" href="#">Hiasan</a>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
</template>
