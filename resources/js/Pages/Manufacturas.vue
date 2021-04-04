<template>
<app-layout>
  <template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{form.title}} Manufactura 
              <form @submit.prevent="submit">                
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Modelo</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.modelo">
                    <div v-if="errors.modelo" class="text-red-500">{{ errors.modelo }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Observacion</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.observacion">
                    <input type="hidden" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.bandera">
                </div>
                <div class="mb-4">
                  <input type="radio" id="Rojo" value="Rojo" v-model="form.color">
                  <label for="Rojo">Rojo</label>
                  <input type="radio" id="Azul" value="Azul" v-model="form.color">
                  <label for="Azul">Azul</label>
                  
                  <span> Estado: <div v-if="form.color==='Azul'"
                        class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full"
                      ></div>
                      <div v-if="form.color==='Rojo'"
                        class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-red-200 text-red-700 rounded-full"
                      ></div>
                  </span>

                  

                </div>
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <div v-if="!editModelo">
                    <input type="file" @change="selectFile">
                    <div v-if="errors.imagen" class="text-red-500">{{ errors.imagen }}</div>
                    <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" @click="saveManufactura(form)">
                    Guardar
                    </button>
                    </div>
                    <div v-if="editModelo">

                    <button wire:click.prevent="store()"  @click="updateManufactura(form)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Actualizar
                    </button>
                    </div>
                </span>
            </form>
      </h2>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table>
              <thead>
                <tr>
                  
                  <th >
                  </th>
                  <th >
                    Modelo
                  </th>
                  <th >
                    Observaciones
                  </th>
                  <th>
                    Total
                  </th>
                  <th>
                    Opciones
                  </th>
                  
	            </tr>
              </thead>
              <tbody>
                <tr v-for="manufactura in manufacturas" :key="manufactura.id">
                  <td>
                    <img :src="`/storage/${manufactura.imagen}`" alt="{{ manufactura.modelo }}" class="rounded-full h-20 w-20 object-cover">
                  </td>
                  <td>
                    <div v-if="manufactura.color==='Azul'"
                        class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full"
                      >
                          {{ manufactura.modelo }}
                      </div>
                      <div v-if="manufactura.color==='Rojo'"
                        class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-red-200 text-red-700 rounded-full"
                      >
                          {{ manufactura.modelo }}
                      </div>
                  </td>
                  
                  <td>
                          <div>{{ manufactura.observacion }}</div>
                  </td>
                  <td>
                    {{manufactura.total}}
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

    <!--Inicia el modal-->
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpenModalModelo">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form v-on:submit.prevent>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
                {{formConteo.title}} <label> {{formConteo.modelo}} </label>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="formConteo.nombre">
                    <div v-if="errors.nombre" class="text-red-500">{{ errors.nombre }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                    <input type="number" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="formConteo.cantidad">
                    <div v-if="errors.cantidad" class="text-red-500">{{ errors.cantidad }}</div>
                </div>
                
                <div class="mb-4">

                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Talla</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  v-model="formConteo.talla">
                    <div v-if="errors.talla" class="text-red-500">{{ errors.talla }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Observacion</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  v-model="formConteo.observacion">
                    <div v-if="errors.observacion" class="text-red-500">{{ errors.observacion }}</div>
                </div>
        </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" @click="saveConteo(formConteo)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
            Guardar
            </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button @click="closeModalModelo()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Cerrar
            </button>
        </span>
        </div>
        <!--INICIA TABLA DENTRO MODAL-->
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table>
              <thead>
                <tr>
                  <th>Talla</th>
                  <th >
                    Nombre
                  </th>
                  <th >
                    Cantidad
                  </th>
                  <th>
                    Total
                  </th>
                  <th >
                    Observaciones
                  </th>
                  <th>Fecha</th>
                  <th>
                    Opciones
                  </th>
                  
	            </tr>
              </thead>
              <tbody>
                <tr v-for="conteo in conteos" :key="conteo.id">
                  <td>{{conteo.talla}}</td>
                  <td>
                          {{ conteo.nombre }}
                  </td>
                  <td>
                          {{ conteo.cantidad }}
                  </td>
                  <td>
                    {{ conteo.total }}
                  </td>
                  <td>
                          {{ conteo.observacion }}
                  </td>
                  <td>{{conteo.created_at}}</td>
                  <td>
                    <button @click="eliminaconteo(conteo)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
                  </td>
                  
                </tr>
              </tbody>
            </table>

            </div>
        </div>
    </div>
        
        <!--fINAL TABLA DENTRO MODAL-->
        </form>
        
    </div>
    </div>
</div>
<!--Termina modal-->

      
</template>
</app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: {manufacturas:Array,
    errors:Object,
    messages:Object,
    conteos:Object
    },
  data(){
      return {
        form:{
          title:'Nuevo',
          observacion:'',
          modelo:'',
          bandera:'M',
          imagen:Object,
          color:'',
          total:'',
        },
        formConteo:{
          title:'Listado',
          modelo:'',
          id_modelo:'',
          bandera:'C',
          nombre:'',
          observacion:'',
          cantidad:'',
          talla:'',
        },
        url:'/manufacturas/',
        editModelo:false,
        isOpenModalModelo:false,
          isOpenModalModelo:false,
            // form:this.$inertia.form( {
            //     title: 'Crear',
            //     bandera: 'M',
            //     imagen: null,
            //     nombre: null,
            //     observacion: null,
            // }),
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
          if (this.$refs.photo) {
            this.form.photo = this.$refs.photo.files[0]
          } 
          this.$inertia.post('/manufacturas/',this.form);
      },
      saveConteo(d){
          this.$inertia.visit(this.url+this.formConteo.id_modelo+'/edit/',{method:'get',data:this.formConteo,replace: false,
        preserveState: true,
        preserveScroll: true,});
      },
      updateManufactura(d){
        
        this.$inertia.put('/manufacturas/'+this.form.id,this.form);
        this.reset();
        this.editModelo=false;
      },
      detalleManufactura(d){
        this.isOpenModalModelo=true;
        this.formConteo.id_modelo=d.id;
        this.formConteo.modelo=d.modelo;

        this.$inertia.visit(this.url+this.formConteo.id_modelo, 
        {method:'get',
        // data:d,
        replace: false,
        preserveState: true,
        preserveScroll: true,
        });
        //this.$inertia.get('/manufacturas/'+d.id);
      },
      editManufactura(d){
        this.editModelo=true;
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
      closeModalModelo(){
        this.reset();
        this.isOpenModalModelo=false;

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
            // this.form.append('imagen',event.target.files[0]);
        },
  },
  components: {
      AppLayout,
  },
};
</script>