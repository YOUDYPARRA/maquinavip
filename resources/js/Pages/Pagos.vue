<template>
<app-layout>
  <template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Historial de pagos para {{nombre}}
              <form @submit.prevent="submit" @submit="checkForm">                
                <div class="mb-4">
                </div>
                
                <div class="mb-4">
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                    <input type="number" min="1" @blur="checarValor(this)" v-model="form.monto" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                    <div v-if="errors.monto" class="text-red-500">{{ errors.monto }}</div>
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
            Nombre: {{nombre}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table class="border-separate border-2 border-gray-800">
              <thead>
                <tr>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Cantidad
                  </th>
                  <th class="border border-gray-400 px-4 py-2 text-gray-800">
                    Observacion
                  </th>
                  <th></th>
	            </tr>
              </thead>
              <tbody>
                <tr v-for="pago in pagos" :key="pago.id" class="bg-emerald-200">
                  <td class="border border-gray-400 px-4 py-2">
                    {{pago.monto}}
                  </td>
                  <td class="border border-gray-400 px-4 py-2">
                    {{pago.observacion}}
                  </td>
                  
                  <td class="border border-gray-400 px-4 py-2">
                    <button @click="eliminaMaquilero(pago)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
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
    pagos:Object,
    nombre:'',
    id_nombre:'',
    errors:Object
    },
  data(){
      return {
        form:{
          id_nombre:this.id_nombre,
          monto:'',
          observacion:'',
        },
        url:'/pagos/',
        editMonto:false,
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
          if (!confirm('¿Eliminar? ')) return;
        d._method = 'DELETE';
        this.$inertia.post(
          route("pagos.destroy", d.id),
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