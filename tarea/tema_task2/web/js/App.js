require(['vue', 'jquery', 'domReady!'], (Vue, $) => {
    const { createApp, ref } = Vue;

    const app = createApp({
        setup() {
            const greeting = ref('Hola Mundo desde Vue.js en Magento 2sssssssssssss');
            const saludodd = ref("chao a todos xD");

            return {
                greeting,
                saludodd
            };
        }
    }).mount('#app');
});

