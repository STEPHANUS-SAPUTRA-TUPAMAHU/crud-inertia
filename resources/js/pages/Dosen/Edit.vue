<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3'

const props = defineProps({
    dosen: Object,
})

const form = useForm({
    nip: props.dosen.nip,
    nama: props.dosen.nama,
    prodi: props.dosen.prodi,
    fakultas: props.dosen.fakultas,
    email: props.dosen.email,
    alamat: props.dosen.alamat,
    no_telepon: props.dosen.no_telepon,
})

const submit = () => {
    form.put(`/dosen/${props.dosen.id}`)
}
</script>

<template>
    <Head title="Edit Dosen" />

    <div class="max-w-4xl mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">
            Edit Data Dosen
        </h1>

        <form @submit.prevent="submit" class="space-y-5">

            <div>
                <label class="block mb-1 font-medium">NIP</label>
                <input
                    v-model="form.nip"
                    type="text"
                    class="w-full rounded-lg border p-3"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">Nama</label>
                <input
                    v-model="form.nama"
                    type="text"
                    class="w-full rounded-lg border p-3"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">Program Studi</label>
                <input
                    v-model="form.prodi"
                    type="text"
                    class="w-full rounded-lg border p-3"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">Fakultas</label>
                <input
                    v-model="form.fakultas"
                    type="text"
                    class="w-full rounded-lg border p-3"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input
                    v-model="form.email"
                    type="email"
                    class="w-full rounded-lg border p-3"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea
                    v-model="form.alamat"
                    class="w-full rounded-lg border p-3"
                ></textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">No Telepon</label>
                <input
                    v-model="form.no_telepon"
                    type="text"
                    class="w-full rounded-lg border p-3"
                >
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="rounded-lg bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-700 disabled:opacity-50"
            >
                {{ form.processing ? 'Menyimpan...' : 'Update Data' }}
            </button>

        </form>
    </div>
</template>