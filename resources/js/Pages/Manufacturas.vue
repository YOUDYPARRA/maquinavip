<template>
<app-layout>
  <template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{form.title}} Manufactura 
              <form @submit.prevent="submit">                
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.nombre">
                    <div v-if="errors.nombre" class="text-red-500">{{ errors.nombre }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Observacion</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.observacion">
                    <input type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.bandera">
                    <div v-if="errors.imagen" class="text-red-500">{{ errors.imagen }}</div>
                </div>
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <input type="file" @change="selectFile">

                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" @click="saveManufactura(form)">
                    Guardar
                    </button>
                </span>
            </form>
      </h2>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table>
              <thead>
                <tr>
                  <th>
                    #UID
                  </th>
                  <th >
                    Nombre
                  </th>
                  <th >
                  Imagen
                  </th>
                  <th >
                    Observaciones
                  </th>
                  <th>
                    Opciones
                  </th>
                  
	            </tr>
              </thead>
              <tbody>
                <tr v-for="manufactura in manufacturas" :key="manufactura.id">
                  <td>
                          {{ manufactura.id }}
                  </td>
                  <td>
                          {{ manufactura.nombre }}
                  </td>
                  <td>
                          <img :src="`/storage/${manufactura.imagen}`">
                  </td>
                  <td>
                          <div>{{ manufactura.observacion }}</div>
                  </td>
                
                  <td>
                      <button @click="editManufactura(manufactura)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Editar</button>
                    <button @click="eliminaManufactura(manufactura)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
                    <button @click="detalleManufactura(manufactura)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Detalles</button>
                   
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
    props: {manufacturas:Array,
    errors:Object,
    messages:Object
    },
  data(){
      return {
          isOpenModalModelo:false,
            form:this.$inertia.form( {
                title: 'Crear',
                bandera: 'M',
                imagen: null,
                nombre: null,
                observacion: null,
            }),
      }
  },
  methods:{
      openModalModelo:function(d){
        this.isOpenModalModelo=true;
        if(d){
          this.form = Object.assign({}, d);
          this.editModalModelo=true;
        }else{
          this.editModalModelo=false;
        }
      },
      
      closeModalModelo(){
          this.isOpenModalModelo=false;
          // this.reset();
          //this.errorReset();
      },
      saveManufactura(d){
        if(d.id){
          this.updateManufactura(d);

        }else{
          if (this.$refs.photo) {
            this.form.photo = this.$refs.photo.files[0]
          } 
          this.form.post('/manufacturas/');
        }
      },
      updateManufactura(d){
        //console.log(d);
        var x=d;
        this.$inertia.put('/manufacturas/'+this.form.id,x);
        this.reset();
      },
      editManufactura(d){
        this.form = Object.assign({}, d);
        this.form.title='Editar';
      },
      eliminaManufactura(d){
          if (!confirm('¿Eliminar? '+d.nombre)) return;
        d._method = 'DELETE';
        this.$inertia.post(
          route("manufacturas.destroy", d.id),
          d
        );

      },
      reset(){
          this.form={
            nombre:null,
            imagen:null,
            observacion:null,
            prog:null,
          };
      },
      selectFile(event) {
            // `files` is always an array because the file input may be in multiple mode
            this.form.imagen = event.target.files[0];
        },
  },
  components: {
      AppLayout,
  },
};
</script>