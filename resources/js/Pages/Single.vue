<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div  class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
                            <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
                        <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                            <img src="" class="h-24 w-24 object-cover rounded-full">
                            <h1  class="text-2xl font-semibold">{{patients.name}}</h1>
                            <h4 class="text-sm font-semibold">{{patients.phone}}</h4>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 bg-white ">

                        <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
                            <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold">Basic Information</a>
                            <button @click="toggleModal = true , scrollTop()" class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold hover:bg-indigo-700 hover:text-gray-200">Consultation timeline</button>
                        </div>

                    <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
                        <div class="px-4 pt-4">
                            <form @submit.prevent="submit" class="flex flex-col space-y-8">

                                <div>
                                    <h3 class="text-2xl font-semibold">Basic Information</h3>
                                    <hr>
                                </div>

                                <div class="form-item">
                                    <label class="text-xl ">Full Name</label>
                                    <input type="text" v-bind:value="patients.name" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled> 
                                </div>

                                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                                    <div class="form-item w-full">
                                        <label class="text-xl ">Patient_id</label>
                                        <input type="text"  v-bind:value="patients.id" :key="patients.name" value="antonia" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                                    </div>

                                    <div class="form-item w-full">
                                        <label class="text-xl ">Phone</label>
                                        <input type="text" v-bind:value="patients.phone"  class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-2xl font-semibold ">Consultation Section</h3>
                                    <hr>
                                     <div class="form-item w-full">
                                        <label class="text-xl ">Title</label>
                                        <input type="text" v-model="form.title"  class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
                                    </div>
                                </div>

                                <div class="form-item w-full">
                                    <label class="text-xl ">New Consultation</label>
                                    <textarea  v-model="form.description" cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " placeholder="Consultation goes here..." ></textarea>
                                </div>
                                    <button  class="border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline" type="submit">Create</button>
                            </form>
                        </div>
                    </div>
                   </div>         
                 </div>
              </div>
            </div>
             

           

                <div v-for=" (consultation, propretyName) of consultations" class="w-full md:w-3/5 mx-auto p-8">
                    
                    <div class="shadow-md">
                        <div class="tab w-full overflow-hidden border-t">
                            <input class="absolute opacity-0" id="tab-single-one" type="radio" name="tabs2">
                            <label class="block p-5 leading-normal cursor-pointer" for="tab-single-one">{{consultation.title}}</label>
                            <div  class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                <p class="p-5">{{consultation.description}}</p>
                            </div>
                        </div>
                    </div>
                </div>    

>
    </app-layout>
</template>
     <style>


        /* Tab content - closed */
         .tab-content {
         max-height: 0;
         -webkit-transition: max-height .35s;
         -o-transition: max-height .35s;
         transition: max-height .35s;
         }
         /* :checked - resize to full height */
         .tab input:checked ~ .tab-content {
         max-height: 100vh;
         }
         /* Label formatting when open */
         .tab input:checked + label{
         /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
         font-size: 1.25rem; /*.text-xl*/
         padding: 1.25rem; /*.p-5*/
         border-left-width: 2px; /*.border-l-2*/
         border-color: #6574cd; /*.border-indigo*/
         background-color: #f8fafc; /*.bg-gray-100 */
         color: #6574cd; /*.text-indigo*/
         }
         /* Icon */
         .tab label::after {
         float:right;
         right: 0;
         top: 0;
         display: block;
         width: 1.5em;
         height: 1.5em;
         line-height: 1.5;
         font-size: 1.25rem;
         text-align: center;
         -webkit-transition: all .35s;
         -o-transition: all .35s;
         transition: all .35s;
         }
         /* Icon formatting - closed */
         .tab input[type=checkbox] + label::after {
         content: "+";
         font-weight:bold; /*.font-bold*/
         border-width: 1px; /*.border*/
         border-radius: 9999px; /*.rounded-full */
         border-color: #b8c2cc; /*.border-grey*/
         }
         .tab input[type=radio] + label::after {
         content: "\25BE";
         font-weight:bold; /*.font-bold*/
         border-width: 1px; /*.border*/
         border-radius: 9999px; /*.rounded-full */
         border-color: #b8c2cc; /*.border-grey*/
         }
         /* Icon formatting - open */
         .tab input[type=checkbox]:checked + label::after {
         transform: rotate(315deg);
         background-color: #6574cd; /*.bg-indigo*/
         color: #f8fafc; /*.text-grey-lightest*/
         }
         .tab input[type=radio]:checked + label::after {
         transform: rotateX(180deg);
         background-color: #6574cd; /*.bg-indigo*/
         color: #f8fafc; /*.text-grey-lightest*/
         }

     
		
		
        

            /* Set a background color */
            body {
            background-color: #19529C;
            font-family: Helvetica, sans-serif;
            }
    
        </style>
        <script>
            import AppLayout from '@/Layouts/AppLayout'
            


            export default {

                props: {
                patients: Object,
                consultations: Array
                    },
                components: {
                    AppLayout,  
                    
                },
                data(){

                    return{

                        hide: false,
                        form:{                   
                            title: null,
                            description:null
                        },
                    }
                },

                
                methods: {

                    scrollTop(){

                         window.scrollTo(0, 0);
                         
                    },
                    submit(patients){

                    const data =new FormData()
                    data.append('patient_id', this.patients.id || '')
                    data.append('title', this.form.title || '')
                    data.append('description', this.form.description|| '')

                    this.$inertia.post(this.route('create.consultation',{id:patients.id}).url(),data)
                        
                    
                    },
                
                }

                

                
            }


        </script>