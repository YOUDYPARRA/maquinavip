<template>
<app-layout>
  <template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{modelo.manufactura.modelo}} Cantida maquilada: {{total}}
              <form @submit.prevent="submit" @submit="checkForm">                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <div v-if="!editMaquila">

                    <select v-model="form.id_nombre" class="form-control" id="nombre">
                        <option v-for="nombre in nombres" :value="nombre.id">{{nombre.nombre}}</option>
                    </select>
                    </div>
                    <div v-if="errors.nombre" class="text-red-500">{{ errors.nombre }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Talla</label>
                    <input type="text" v-model="form.talla" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="talla">
                    <div v-if="errors.talla" class="text-red-500">{{ errors.talla }}</div>
                </div>
                <div class="mb-4">
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                    <input type="number" min="1" @blur="checarValor(this)" v-model="form.cantidad" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                    <div v-if="errors.cantidad" class="text-red-500">{{ errors.cantidad }}</div>
                </div>
                <div class="mb-4">
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Hilo recta</label>
                    <input type="text" v-model="form.hilo_recta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                    <div v-if="errors.hilo_recta" class="text-red-500">{{ errors.hilo_recta }}</div>
                </div>
                <div class="mb-4">
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Hilo over</label>
                    <input type="text" v-model="form.hilo_over" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <div v-if="errors.hilo_over" class="text-red-500">{{ errors.hilo_over }}</div>
                </div>
                <div class="mb-4">
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Tipo</label>
                    <input type="text" v-model="form.tipo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                    <div v-if="errors.tipo" class="text-red-500">{{ errors.tipo }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Observacion</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.observacion">
                </div>
                <div v-if="!editMaquila">
                  <button wire:click.prevent="store()"  @click="saveMaquilero(form)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Guardar
                    </button>
                </div>
                <div v-if="editMaquila">
                  <button wire:click.prevent="store()"  @click="updateMaquilero(form)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Actualizar
                </button>
                </div>
                
            </form>
      </h2>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Maquileros para modelo: {{modelo.manufactura.modelo}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table class="border-separate border-2 border-gray-800">
              <thead>
                <tr>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Nombre
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Talla
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Cantidad
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Hilo recta
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Hilo over
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Tipo
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Observaciones
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    
                  </th>
                  
	            </tr>
              </thead>
              <tbody>
                <tr v-for="maquilero in maquileros" :key="maquilero.id" class="bg-emerald-200">
                  <td class="border border-gray-400 px-4 py-2">
                    {{maquilero.nombre}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    {{maquilero.talla}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    {{maquilero.cantidad}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    {{maquilero.hilo_recta}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    {{maquilero.hilo_over}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    {{maquilero.tipo}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                      {{ maquilero.observacion }}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    <button @click="eliminaMaquilero(maquilero)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
                    <button @click="editMaquilero(maquilero)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Editar</button>
                   <inertia-link href="/pagos" :data="{maquilero}" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Pagos
                    </inertia-link>
                  </td>
                  
                </tr>
              </tbody>
            </table>

            
            </div>
        </div>
    </div>
</template>
</app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: {
    maquileros:Object,
    modelo:Object,
    total:Object,
    nombres:Object,
    errors:Object,
    messages:Object,
    conteos:Object
    },
  data(){
      return {
        form:{
          id_modelo:this.modelo.manufactura.id,
          talla:'',
          cantidad:'',
          id_nombre:'',
          nombre:'',
          hilo_recta:'',
          hilo_over:'',
          observacion:'',
          tipo:'',
        },
        url:'/maquileros/',
        editMaquila:false,
      }
  },
  methods:{
      saveMaquilero(d){
        this.$inertia.post(this.url,this.form);
      },
      updateMaquilero(d){
        this.$inertia.put(this.url+this.form.id,this.form);
        // this.reset();
        this.editMaquila=true;
      },
      editMaquilero(d){
        this.editMaquila=true;
        this.form = Object.assign({}, d);
        // this.form.title='Editar';
      },
      eliminaMaquilero(d){
          if (!confirm('¿Eliminar? '+d.nombre+' '+d.cantidad)) return;
        d._method = 'DELETE';
        this.$inertia.post(
          route("maquileros.destroy", d.id),
          d
        );
      },
      filterKey(e){
        console.log('filter de kwy');
        if(e.keyCode < 48 || e.keyCode > 57) {
        // No se agrega
        e.preventDefault();
        }
      },
      checarValor(item) {
          // Obtener valor actual
          let valor = parseInt(item.value);
          // Si no es número o es menor de 1
          if(isNaN(valor) || valor < 1) {
              // Asignar 1
              this.form.cantidad=0;
          }
      },
      reset(){
          this.form={
          id_nombre:null,
          talla:null,
          cantidad:null,
          nombre:null,
          hilo_recta:null,
          hilo_over:null,
          observacion:null,
          tipo:null,
          };
      },
      
  },
  components: {
      AppLayout,
  },
};
</script>