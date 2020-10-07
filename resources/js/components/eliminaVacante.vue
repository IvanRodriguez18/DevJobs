<template>
    <button class="text-red-600 hover:text-red-900 mr-5 focus:outline-none" @click="eliminarVacante">
        Eliminar
    </button>
</template>

<script>
export default {
    props:['vacanteId', 'vacante'],
    methods: {
        eliminarVacante(){
            console.log('Vacante número: ' + this.vacanteId)
            this.$alertify.confirm(`¿Deseas eliminar la vacante ${this.vacante}?`,
            () => {
                const params = {
                    id: Number(this.vacanteId),
                    _method: 'delete'
                }
                axios.post(`/vacante/${this.vacanteId}`, params)
                .then(respuesta => {
                    console.log(respuesta)
                    if (respuesta.data.message == "success")
                    {
                        this.$alertify.success("Vacante eliminada");
                        this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                    }
                })
                .catch(error => console.log(error));
            },
            () =>this.$alertify.error("Acción cancelada")
            )
            .set('labels', {ok: 'Confirmar', cancel: 'Cancelar'})
            .set({transition: 'zoom'})
            .setHeader('Eliminar Vacante');
        }
    }
}
</script>
