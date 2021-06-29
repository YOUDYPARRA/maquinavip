<template>
<app-layout>
  <template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <form @submit.prevent="submit">                
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  v-model="form.nombre">
                    <div v-if="errors.nombre" class="text-red-500">{{ errors.nombre }}</div>
                </div>
                               
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <div v-if="!editNombre">
                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" @click="saveNombre(form)">
                    Guardar
                    </button>
                    </div>
                    <div v-if="editNombre">
                    <button wire:click.prevent="store()"  @click="updateNombre(form)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Actualizar
                    </button>
                    </div>
                </span>
            </form>
    </h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table>
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>
                    Nombre
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="n in nombres" :key="n.id">
                  <td>
                          {{ n.id }}
                  </td>
                <td>
                          {{ n.nombre }}
                </td>
                  <td>
                      <button @click="editaNombre(n)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Editar</button>
                   
                  </td>
                  <td>
                    <button @click="eliminaNombre(n)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
                  </td>
                </tr>
              </tbody>
            </table>

            </div>
        </div>
    </div>
<div>
</div>
</app-layout>

</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: {nombres:Array,
    errors:Object,
    messages:Object
    },
  data(){
      return {
            form: {
                nombre: '',
            },
          url:'/nombres/',
          editNombre:false,
      }
  },
  methods:{
      
      saveNombre(d){
        this.$inertia.post(this.url,this.form);
      },
      updateNombre(d){
        //console.log(d);
        var x=d;
        this.$inertia.put(this.url+this.form.id,x);
      },
      eliminaNombre(d){
          if (!confirm('¿Eliminar Nombre? '+d.nombre)) return;
        d._method = 'DELETE';
        this.$inertia.post(
          route("nombres.destroy", d.id),
          d
        );
      },
      editaNombre(d){
          this.form = Object.assign({}, d);
          this.editNombre=true;
      },

  },
  components: {
      AppLayout,
  },
};
</script>
