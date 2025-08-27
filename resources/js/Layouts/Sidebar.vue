<script setup>
import { Link } from '@inertiajs/vue3'
</script>
<template>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#postingan" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Postingan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="postingan" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#" wire:navigate="true">
                            <i class="bi bi-circle"></i><span>Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" wire:navigate="true">
                            <i class="bi bi-circle"></i><span>Halaman</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-item">
                <Link class="nav-link collapsed" href="/wp-admin/tema/index">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>
                    Tema ({{ $page.props.tema_aktif.nama  }})
                    </span>
                </Link>
            </li>

            <li class="nav-item">
                <Link class="nav-link collapsed" :href="`/wp-admin/hiasan/${$page.props.tema_aktif.id}/index`" wire:navigate="true">
                    <i class="bi bi-bar-chart"></i>
                    <span>Hiasan</span>
                </Link>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" wire:navigate="true">
                    <i class="bi bi-card-list"></i>
                    <span>Berkas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#master" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="master" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#" wire:navigate="true">
                            <i class="bi bi-circle"></i><span>Tipe</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" wire:navigate="true">
                            <i class="bi bi-circle"></i><span>Single Page</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->




        </ul>

    </aside><!-- End Sidebar-->

</template>
