<template>
   <div>
       <button :type="tipo" class="my-button" v-text="test.name"> </button> <!-- ACORDARSE DE PONER LA CLASE PARA EL CSS -->
   </div>                           <!-- v-text crea una variable donde puedes mandar texto. Los : hacen que la propiedad sea bindeada -->
</template>

<script>
    export default { //el componente se tiene que registrar siempre en app.js
        mounted() { //un evento. Cuando el view monta el componente, se ejecuta esto
            console.log('Component mounted sda.')
            
            axios.post('api/vue', {}) //targeteo la ruta que se llama 'vue' en el archivo api.php 
                .then(response => {
                    this.test = response.data; //guardo lo que pilla en una nueva variable llamada test (que esta localizada en el v-text). En el elemento, pillo la variable test y pillo el subelemento name, establecido en el controller
                });
        },

        data: function() { //creo una funcion para guardar los datos en una propiedad tipo data; es necesario
            return{
                test: null, //declaro test como null
            }
        },

        props: [
            'texto', //aqui pongo las propiedades que quiero que tenga el boton 
            'tipo'

       ]
    }
</script>

<style>
    .my-button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        font-weight: bold;
    }
    
</style>