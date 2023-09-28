require(["jquery", "domReady!", "vue"], function ($, doc, Vue) {
    const { createApp, ref } = Vue;
    const app = createApp({
        data() {
            return {
                respuesta: null,
                holamundo: "Hola Mundo", // Define la constante "holamundo"
            };
        },
        beforeCreate() {
            console.log("beforeCreate: La instancia de Vue se está creando.");
            // Puedes realizar configuraciones iniciales aquí.
        },
        created() {
            console.log("created: La instancia de Vue se ha creado.");
            // Puedes hacer llamadas a la API u otras inicializaciones aquí.
        },
        beforeUpdate() {
            console.log(
                "beforeUpdate: Los datos están a punto de actualizarse."
            );
        },
        updated() {
            console.log("updated: Los datos se han actualizado.");
        },
        mounted() {
            const el = document.getElementById("app");
            if (el) {
                this.respuesta = el.getAttribute("data-valor");
            }
        },
        methods: {
            changeResp() {
                console.log("presionando el botón cambiar");
                if (this.respuesta === "OK") {
                    this.respuesta = "NO";
                } else {
                    this.respuesta = "OK";
                }
            },
        },
    }).mount("#app");
});
