<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pt-2 relative mx-auto text-gray-600">
               <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                     type="search" v-model="search"  name="search" placeholder="Search">
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            
                              <table class="min-w-full divide-y divide-gray-200 bg-blue-700">
                                <thead>
                                  <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-700 text-left text-xs font-bold text-gray-50 uppercase tracking-wider">
                                      Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-700 text-left text-xs font-bold text-gray-50 uppercase tracking-wider">
                                      Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-700 text-left text-xs font-bold text-gray-50 uppercase tracking-wider">
                                      Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-700 text-left text-xs font-bold text-gray-50 uppercase tracking-wider">
                                      Age
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-700">
                                      <Button @click.native="showModal"  class="modal-open bg-transparent border border-gray-50 hover:border-indigo-500 text-gray-50 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Create patient</Button>
                                      </a>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                  <tr  v-for="patient in  filtered" :key="patients.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                                        </div>
                                        <div class="ml-4">
                                          <a :href="route('patient',{patient})" class="text-sm font-blod text-gray-900">
                                            <b>{{patient.name}}</b>
                                          </a>
                                          <div class="text-sm text-gray-500">
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">Jane Cooper</div>
                                      <div class="text-sm text-gray-500">Optimization</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="text-sm text-gray-900"><b>{{patient.phone}}</b></div>
                                      <div class="text-sm text-gray-500">Optimization</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                      </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                  </tr>
                                  <!-- More rows... -->
                                </tbody>
                              </table>
                               <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                    <div class="flex-1 flex justify-between sm:hidden">
                                      <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                                        Previous
                                      </a>
                                      <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
                                        Next
                                      </a>
                                    </div>
                                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                      <div>
                                        <p class="text-sm text-gray-700">
                                          Showing
                                          <span class="font-medium">1</span>
                                          to
                                          <span class="font-medium">10</span>
                                          of
                                          <span class="font-medium">97</span>
                                          results
                                        </p>
                                      </div>
                                      <div>
                                      <nav class="relative z-0 inline-flex shadow-sm -space-x-px" aria-label="Pagination">
                                        <a  href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                          <span class="sr-only"></span>
                                          <!-- Heroicon name: chevron-left -->
                                          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                          </svg>
                                        </a>
                                        <a   v-for="(link, key) in patients.links" :href="link.url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                          {{link.label}}
                                        </a>
                                        <a class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                          <span class="sr-only">Next</span>
                                          <!-- Heroicon name: chevron-right -->
                                          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                          </svg>
                                        </a>
                                      </nav>
                                    </div>
                                  </div>
                                </div>                          
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <Footer/>

          <!--Post Modal--> 

         <jet-dialog-modal :show="show" @close="show = false">
            <template #title>
              Create New Post
            </template>
            <template #content>
             
                 <div class="w-full mb-10">
                   <div class="mb-4">
                      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                        Username
                      </label>
                       <input  v-model="form.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="name" type="text" placeholder="Name">
                   </div>    
                    <input v-model="form.phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="phone" type="number" placeholder="Phone"> 
                 </div>
               
            </template>

            <template #footer>
                <jet-secondary-button @click.native="submit" :disabled="form.processing">
                        Submit
                </jet-secondary-button>
            </template>
         
         </jet-dialog-modal>
       
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    //import Welcome from '@/Jetstream/Welcome'
    import Footer from '@/Jetstream/Footer'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import Button from '@/Jetstream/Button'

 
  export default {

        props: {
          patients: Object,

          
            },
        components: {
            AppLayout,  
            Footer,
            JetDialogModal,
            Button,
            JetSecondaryButton,

        },

        data(){
          return{
        
            search:'',
            show:false,

            form:{
                   
                    name: null,
                    phone:null
                },
          }

          
        },

       

        methods:{
          showModal(){

            this.show = true;

          },


           scrollTop(){
                     window.scrollTo(0, 0);    
                    },
          submit(){

              const data =new FormData()
              data.append('name', this.form.name || '')
              data.append('phone', this.form.phone|| '')

              this.$inertia.post(this.route('create'),data)
              
              this.show = false
                
            },


        },

       computed:{
         filtered:function(){
            return this.patients.data.filter((patient)=> {
              return patient.name.match(this.search)
            })
          }
       }
        
    }

    

</script>
