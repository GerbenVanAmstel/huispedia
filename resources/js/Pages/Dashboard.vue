<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                    <form ref="form" @submit.prevent="submit">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="naam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naam</label>
                                <input type="text" id="naam" v-model="form.naam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.naam">{{ form.validationErrors.naam[0] }}</span></p>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="email" v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.email">{{ form.validationErrors.email[0] }}</span></p>
                            </div>
                            <div>
                                <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postcode</label>
                                <input type="text" id="postcode" v-model="form.postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.postcode">{{ form.validationErrors.postcode[0] }}</span></p>
                            </div>
                            <div>
                                <label for="huisnummer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Huisnummer en toevoeging</label>
                                <input type="text" id="huisnummer" v-model="form.huisnummer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.huisnummer">{{ form.validationErrors.huisnummer[0] }}</span></p>
                            </div>
                            <div>
                                <label for="woningtype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Woningtype</label>
                                <select id="woningtype" v-model="form.woningtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" disabled selected hidden>Selecteer woningtype</option>
                                    <option value="Appartement">Appartement</option>
                                    <option value="Tussenwoning">Tussenwoning</option>
                                    <option value="Hoekwoning">Hoekwoning</option>
                                    <option value="Twee-onder-een-kapwoning">Twee-onder-een-kapwoning</option>
                                    <option value="Vrijstaande woning">Vrijstaande woning</option>
                                </select>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.woningtype">{{ form.validationErrors.woningtype[0] }}</span></p>
                            </div>
                            <div>
                                <label for="onderhoud" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Onderhoud</label>
                                <select id="onderhoud" v-model="form.onderhoud" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" disabled selected hidden>Selecteer onderhoud</option>
                                    <option value="Uitstekend">Uitstekend</option>
                                    <option value="Goed">Goed</option>
                                    <option value="Gemiddeld">Gemiddeld</option>
                                    <option value="Toe aan onderhoud">Toe aan onderhoud</option>
                                    <option value="Slecht">Slecht</option>
                                </select>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.onderhoud">{{ form.validationErrors.onderhoud[0] }}</span></p>
                            </div>
                            <div>
                                <label for="woonoppervlakte" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Woonoppervlakte</label>
                                <input type="number" step="0.01" id="woonoppervlakte" v-model="form.woonoppervlakte" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.woonoppervlakte">{{ form.validationErrors.woonoppervlakte[0] }}</span></p>
                            </div>
                            <div>
                                <label for="perceeloppervlakte" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perceeloppervlakte</label>
                                <input type="number" step="0.01" id="perceeloppervlakte" v-model="form.perceeloppervlakte" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                <p v-if="form.error" class="mt-2 text-sm text-red-600 dark:text-red-500"><span v-if="form.validationErrors.perceeloppervlakte">{{ form.validationErrors.perceeloppervlakte[0] }}</span></p>
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bereken woningwaarde</button>
                    </form>
                    <div v-if="waarde" class="mt-16 mb-16">
                        <p class="text-4xl font-medium text-gray-900 dark:text-white text-center">De waarde van het huis is <span class="text-green-500 font-semibold">€{{ waarde }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    data() {
        return {
            form: {
                naam: undefined,
                email: undefined,
                postcode: undefined,
                huisnummer: undefined,
                woningtype: "",
                onderhoud: "",
                woonoppervlakte: undefined,
                perceeloppervlakte: undefined,
                validationErrors: undefined,
                error: false,
            },
            waarde: undefined,
        };
    },
    methods: {
        submit() {
            this.getWoningWaarde();
        },
        getWoningWaarde() {
            const data = new FormData;
            data.append("naam", this.form.naam);
            data.append("email", this.form.email);
            data.append("postcode", this.form.postcode);
            data.append("huisnummer", this.form.huisnummer);
            data.append("woningtype", this.form.woningtype);
            data.append("onderhoud", this.form.onderhoud);
            data.append("woonoppervlakte", this.form.woonoppervlakte);
            data.append("perceeloppervlakte", this.form.perceeloppervlakte);

            axios
                .post(`/woningwaarde`, data)
                .then((response) => {
                    this.form.error = false;
                    this.form.validationErrors = undefined;
                    this.waarde = response.data;
                })
                .catch(error => {
                    this.form.error = true;
                    this.form.validationErrors = error.response.data.errors;
                });
        },
    }
};
</script>
