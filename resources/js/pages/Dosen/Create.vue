<script setup lang="ts">
import Swal from 'sweetalert2'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    nama: '',
    nip: '',
    email: '',
    fakultas: '',
    prodi: '',
    alamat: '',
    no_telepon: '',
})

const submit = () => {
    form.post('/dosen', {
        onSuccess: () => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data dosen berhasil ditambahkan.',
                timer: 1800,
                showConfirmButton: false,
            })
        },

        onError: () => {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Silakan periksa kembali data yang diinput.',
            })
        },
    })
}
</script>

<template>
    <div class="max-w-xl mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-6">
            Tambah Dosen
        </h1>

        <form @submit.prevent="submit" class="space-y-4">

            <input
                v-model="form.nama"
                placeholder="Nama"
                class="border w-full p-2 rounded"
            />

            <input
                v-model="form.nip"
                placeholder="NIP"
                class="border w-full p-2 rounded"
            />

            <input
                v-model="form.email"
                placeholder="Email"
                class="border w-full p-2 rounded"
            />

            <input
                v-model="form.fakultas"
                placeholder="Fakultas"
                class="border w-full p-2 rounded"
            />

            <input
                v-model="form.prodi"
                placeholder="Prodi"
                class="border w-full p-2 rounded"
            />

            <textarea
                v-model="form.alamat"
                placeholder="Alamat"
                class="border w-full p-2 rounded"
            ></textarea>

            <input
                v-model="form.no_telepon"
                placeholder="No Telepon"
                class="border w-full p-2 rounded"
            />

            <button
                type="submit"
                :disabled="form.processing"
                class="bg-indigo-600 text-white px-4 py-2 rounded"
            >
                Simpan
            </button>

        </form>

    </div>
</template>