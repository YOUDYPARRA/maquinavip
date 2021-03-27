<template>
<app-layout>
  <template #header>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Alumnos 
      <div v-if="$page.props.permision_alumno.create">
        <button @click="openModalAlumno()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Crear Alumno</button>
      </div>      
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
                  <th >
                    Apellido materno
                  </th>
                  <th >
                    Apellido paterno
                  </th>
                  <th >
                    Fecha nacimiento
                  </th>
                  <th >
                    Tipo
                  </th>
                  <th >
                    Equipo
                  </th>
	            </tr>
              </thead>
              <tbody>
                <tr v-for="alumno in alumnos" :key="alumno.id">
                  <td>
                          {{ alumno.id }}
                  </td>
                  <td>
                          {{ alumno.nombre }}
                  </td>
                  <td>
                          <div>{{ alumno.apellido_materno }}</div>
                  </td>
                <td>
                          {{ alumno.apellido_paterno }}
                </td>
                <td>
                          {{ alumno.fecha_nacimiento }}
                </td>
                <td>
                          {{ alumno.tipo_alumno }}
                </td>
                <td>
                          {{ alumno.equipo }}
                </td>
                  <td>
                      <button @click="openModalAlumno(alumno)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Editar</button>
                   
                  </td>
                  <td>
                    <button @click="eliminaAlumno(alumno)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
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
<!--Inicia el modal-->
<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpenModalAlumno">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form v-on:submit.prevent>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="">
                {{form.title}}  
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.nombre">
                    <div v-if="errors.nombre" class="text-red-500">{{ errors.nombre }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Primer Apellido</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.apellido_paterno">
                    <div v-if="errors.apellido_paterno" class="text-red-500">{{ errors.apellido_paterno }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Segundo Apellido</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  v-model="form.apellido_materno">
                    <div v-if="errors.apellido_materno" class="text-red-500">{{ errors.apellido_materno }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento</label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.fecha_nacimiento">
                    <div v-if="errors.fecha_nacimiento" class="text-red-500">{{ errors.fecha_nacimiento }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Correo</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" v-model="form.correo">
                    <div v-if="errors.correo" class="text-red-500">{{ errors.correo }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Equipo</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  v-model="form.equipo">
                    <div v-if="errors.equipo" class="text-red-500">{{ errors.equipo }}</div>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Observacion</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  v-model="form.observacion">
                    <div v-if="errors.observacion" class="text-red-500">{{ errors.observacion }}</div>
                </div>
                <div class="mb-4" v-if="editModalAlumno">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Grupo</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"  v-model="form.id_grupo">
                    <div v-if="errors.id_grupo" class="text-red-500">{{ errors.id_grupo }}</div>
                </div>
        </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="!editModalAlumno" @click="saveAlumno(form)">
            Guardar
            </button>
        </span>
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" v-show="editModalAlumno" @click="updateAlumno(form)">
            Actualizar
            </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button @click="closeModalAlumno()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Cerrar
            </button>
        </span>
        </div>
        </form>
        
    </div>
    </div>
</div>
<!--Termina modal-->
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    props: {alumnos:Array,
    errors:Object
    },
  data(){
      return {
          isOpenModalAlumno:false,
            form: {
                title: '',
            },
      }
  },
  methods:{
      openModalAlumno:function(d){
        this.isOpenModalAlumno=true;
        if(d){
          this.form = Object.assign({}, d);
          this.form.title='Editar  alumno';
          this.editModalAlumno=true;
        }else{
          this.form.title='Crear nuevo  alumno';
          this.editModalAlumno=false;
        }
      },
      editModalAlumno:function(alumno){
        //this.isOpenModalAlumno=true;
        //  this.editModalAlumno=true;         
          
      },
      closeModalAlumno(){
          this.isOpenModalAlumno=false;
          this.reset();
          //this.errorReset();
      },
      saveAlumno(d){
        this.$inertia.post('/alumnos/',d);
      },
      updateAlumno(d){
        //console.log(d);
        var x=d;
        this.$inertia.put('/alumnos/'+this.form.id,x);
      },
      eliminaAlumno(d){
          if (!confirm('¿Eliminar Alumno? '+d.nombre)) return;
        d._method = 'DELETE';
        this.$inertia.post(
          route("alumnos.destroy", d.id),
          d
        );

      },
      // errorReset(){
      //   this.errors.nombre=null;
      //  this.errors.observacion=null;
      //  this.errors.correo=null;
      //  this.errors.apellido_paterno=null;
      //  this.errors.apellido_materno=null;
      //  this.errors.fecha_nacimiento=null;

      // },
      reset(){
          this.form={
            nombre:null,
            apellido_paterno:null,
            apellido_materno:null,
            id_grupo:null,
            fecha_nacimiento:null,
            equipo:null,
            observacion:null,
          };
      }
  },
  components: {
      AppLayout,
  },
};
</script>
