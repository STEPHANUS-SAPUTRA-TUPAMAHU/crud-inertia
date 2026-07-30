<script setup lang="ts">
defineProps({
    users: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-7xl p-8">

            <!-- Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">
                        Data Users
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola seluruh data pengguna aplikasi.
                    </p>
                </div>

                <button
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700"
                >
                    + Tambah User
                </button>
            </div>

            <!-- Card -->
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <!-- Card Header -->
                <div class="border-b border-slate-200 px-6 py-4">
                    <div class="flex items-center justify-between">

                        <div>
                            <h2 class="font-semibold text-slate-800">
                                Daftar User
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Total {{ users.length }} pengguna
                            </p>
                        </div>

                        <input
                            type="text"
                            placeholder="Cari user..."
                            class="rounded-lg border border-slate-300 px-4 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                        >
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-slate-200">

                        <thead class="bg-slate-100">
                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Nama
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Dibuat
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-600">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-200 bg-white">

                            <tr
                                v-for="user in users"
                                :key="user.id"
                                class="transition hover:bg-slate-50"
                            >

                                <td class="px-6 py-4 font-medium">
                                    {{ user.id }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ user.name }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ user.email }}
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <span
                                        v-if="user.email_verified_at"
                                        class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700"
                                    >
                                        Verified
                                    </span>

                                    <span
                                        v-else
                                        class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700"
                                    >
                                        Unverified
                                    </span>

                                </td>

                                <td class="px-6 py-4 text-slate-500">
                                    {{ new Date(user.created_at).toLocaleDateString() }}
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <button
                                            class="rounded-lg bg-amber-500 px-3 py-1.5 text-sm text-white hover:bg-amber-600"
                                        >
                                            Edit
                                        </button>

                                        <button
                                            class="rounded-lg bg-red-500 px-3 py-1.5 text-sm text-white hover:bg-red-600"
                                        >
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