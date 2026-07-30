<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import Swal from 'sweetalert2'
defineProps({
    dosen: {
        type: Array,
        default: () => [],
    },
})

const hapusDosen = (id) => {
    Swal.fire({
        title: 'Hapus data?',
        text: 'Data yang dihapus tidak bisa dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626',
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/dosen/${id}`, {
                onSuccess: () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil dihapus.',
                        timer: 1500,
                        showConfirmButton: false,
                    })
                }
            })
        }
    })
}
</script>

<template>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-7xl p-8">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">
                        Data Dosen Semuanya
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola seluruh data pengguna aplikasi.
                    </p>
                </div>

                <Link href ="/dosen/create"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700">
                    + Tambah Dosen
                </Link>
            </div>

            <!-- Card -->
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <!-- Card Header -->
                <div class="border-b border-slate-200 px-6 py-4">
                    <div class="flex items-center justify-between">

                        <div>
                            <h2 class="font-semibold text-slate-800">
                                Daftar Dosen
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Total {{ dosen.length }} pengguna
                            </p>
                        </div>

                        <input type="text" placeholder="Cari dosen..."
                            class="rounded-lg border border-slate-300 px-4 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-100">
                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    No
                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Nama
                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    NIP
                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    EMAIL
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    fakultas
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    prodi
                                </th>


                                <th
                                    class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200 bg-white">

                            <tr v-for="dosen in dosen" :key="dosen.id" class="transition hover:bg-slate-50">

                                <td class="px-6 py-4 font-medium">
                                    {{ dosen.id }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ dosen.nama }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ dosen.nip }}
                                </td>
                                <td class="px-6 py-4 text-slate-600">
                                    {{ dosen.email }}
                                </td>
                                <td class="px-6 py-4 text-slate-600">
                                    {{ dosen.fakultas }}
                                </td>
                                <td class="px-6 py-4 text-slate-600">
                                    {{ dosen.prodi }}
                                </td>


                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <Link :href="`/dosen/${dosen.id}/edit`"
                                            class="rounded-lg bg-amber-500 px-3 py-1.5 text-sm text-white hover:bg-amber-600">
                                            Edit
                                        </Link>
                                        <button
                                            @click="hapusDosen(dosen.id)" 
                                            
                                            class="rounded-lg bg-red-500 px-3 py-1.5 text-sm text-white hover:bg-red-600">
                                            Hapus
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>
</template>