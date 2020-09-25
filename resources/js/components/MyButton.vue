<template>
   <div>
       <button :type="type" class="my-button" v-text="test.name"> </button> <!-- ACORDARSE DE PONER LA CLASE PARA EL CSS -->
   </div>                           <!-- v-text crea una variable donde puedes mandar texto -->
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted sda.')
            
            axios.post('api/vue', {}) //targeteo 'vue' en api.php EL LIO ESTA AQUI, NO ENCUENTRA LA RUTA
                .then(response => {
                    this.test = response.data; //guardo lo que pilla en test
                });
        },

        data: function() { //creo una funcion para guardar los datos en una propiedad tipo data
            return{
                test: null, //declaro test
            }
        },

        props: [
            'text', //aqui pongo las propiedades que quiero que tenga el boton (como el v-text)
            'type'

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