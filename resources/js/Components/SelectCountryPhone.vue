<script setup>
import {ref, watch} from 'vue';
import countriesData from './../countries.json';
import InputLabel from "@/Components/InputLabel.vue";
import { MaskInput } from 'vue-3-mask';

const emits = defineEmits(['update:phone']);

const selectedCountryCode = ref(null);
const phoneNumber = ref('');
const countries = ref([]);
countries.value = countriesData;
selectedCountryCode.value = countries.value[0].idd
phoneNumber.value = selectedCountryCode.value
watch(selectedCountryCode, (selectedCode) => {
    phoneNumber.value = selectedCode;
});
const handlePhoneNumberChange = (event) => {
    const value = event.target.value;
    emits('update:phone', value);
};
</script>

<template>
    <div class="mt-4">
        <InputLabel for="country" value="Country"/>
        <select v-model="selectedCountryCode" id="country" class="border-gray-300 text-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option v-for="country in countries"
                    :value="country.idd" :key="country.idd"
                    :selected="country.idd === selectedCountryCode"
            >{{ country.flag }} {{ country.name }}</option>
        </select>

        <InputError class="mt-2"/>
    </div>

    <div class="mt-4">
        <InputLabel for="phone" value="Phone number"/>
        <MaskInput id="phone" class="mt-1 border-gray-300 text-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   v-model="phoneNumber"
                   :value="phoneNumber"
                   @input="handlePhoneNumberChange"
                   mask="+### ## ###-##-##" />

        <InputError class="mt-2"/>
    </div>

</template>
