<template>
    <span class="cursor-pointer px-2 inline-flex text-sm leading-5 font-semibold rounded-full"
          @click="cambiarEstado" :key="estadoVacanteData" :class="claseEstadoVacante()">
        {{ estadoVacante }}
    </span>
</template>

<script>
export default {
    props:['estado', 'vacanteId'],
    mounted(){
        this.estadoVacanteData = Number(this.estado)
    },
    data: function(){
        return{
            estadoVacanteData: null
        }
    },
    methods:{
        cambiarEstado(){
            if (this.estadoVacanteData === 1)
            {
                this.estadoVacanteData = 0;
            }
            else
            {
                this.estadoVacanteData = 1;
            }
            //Eviar la petición axios para cambiar el estado de la vacante en la BD
            const params = {
                estatus: this.estadoVacanteData
            }
            axios
                .post('/vacante/' + this.vacanteId, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(error))
        },
        claseEstadoVacante(){
            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        }
    },
    computed: {
        estadoVacante(){
            return this.estadoVacanteData === 1 ? "Activo" : "Inactivo"
        }
    }
}
</script>
