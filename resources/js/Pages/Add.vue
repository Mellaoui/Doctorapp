<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div   class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                  <div >
                    <form @submit.prevent="submit" class="mt-5 md:mt-0 md:col-span-2">
                      <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                           <label  class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                             Full Name
                           </label>
                          <input v-model="form.name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" >
                       </div>  
                       <div class="md:w-1/2 px-3 ">
                         <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                                Phone
                            </label>
                            <input v-model="form.phone" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
                        </div> 
                          <button  class="border border-green-500 text-green-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-600 focus:outline-none focus:shadow-outline" type="submit">Create</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    //import Welcome from '@/Jetstream/Welcome'

    export default {

    
        components: {
            AppLayout,  
        },
        data(){
    
            return{
              
                form:{
                   
                    name: null,
                    phone:null
                },
            }
        },

        methods: {
            submit(){

              const data =new FormData()
              data.append('name', this.form.name || '')
              data.append('phone', this.form.phone|| '')

              this.$inertia.post(this.route('create'),data)
                
            
            }
        }
    }
</script>