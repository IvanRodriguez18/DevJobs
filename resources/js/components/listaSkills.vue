<template>
    <div>
        <ul class="flex flex-wrap justify-between">
            <li :class="verificaEstatus(skill)" class="border border-gray-500 px-3 py-3 text-sm mb-3 rounded-full mr-4 focus:outline-none cursor-pointer"
            v-for="(skill, i) in this.skills" v-bind:key="i" v-on:click="activar($event)">{{ skill }}</li>
        </ul>
        <input type="hidden" name="skill" id="skill">
    </div>
</template>
<script>
    export default{
        props: ['skills', 'allskills'],
        mounted(){
            console.log(this.skills);
            console.log(this.allskills);
            document.querySelector('#skill').value = this.allskills;
        },
        data:function(){
            return{
                habilidades: new Set()
            }
        },
        created: function () {  
            if (this.allskills) {
                const skillsArray = this.allskills.split(',');
                skillsArray.forEach(skill => {
                    this.habilidades.add(skill);
                });
            }
        },
        methods:{
            activar(event){
                if (event.target.classList.contains('bg-teal-500')) {
                    //removiendo la clase bg-teal-500 de la lista de clases en caso de desmarcar la habilidad
                    event.target.classList.remove('bg-teal-500');
                    //Eliminando el nombre de la habilidad en caso de no requerirla en el Set
                    this.habilidades.delete(event.target.textContent);
                } else {
                    //agregando a la lista de clases bg-teal-500 en caso de marcar la habilidad
                    event.target.classList.add('bg-teal-500');
                    //Agregando el nombre de la habilidad marcada por el relutador al Set de data
                    this.habilidades.add(event.target.textContent)
                }
                //Convirtiendo el Set de las Skills en un string para que lo pueda leer el input
                const cadenaHabilidades = [...this.habilidades];
                //Agregando las skillsal input hidden para enviar a la base de datos los valores
                document.querySelector('#skill').value = cadenaHabilidades;
            },
            verificaEstatus(skill){
                return this.habilidades.has(skill) ? 'bg-teal-500' : ''
            }
        }
    }
</script>