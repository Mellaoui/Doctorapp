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
             

             <div v-if="toggleModal" class="absolute inset-0 z-100 opacity-25 bg-black justify-center"></div>
                <div v-for=" (consultation, propretyName) of consultations" class="timeline">
                    <div class="container right">
                        <div class="content">
                            <a>{{consultation.title}}</a>
                            <p>{{consultation.description}}</p>
                        </div>
                    </div>
                </div>
>
    </app-layout>
</template>
     <style>

     .carousel-open:checked + .carousel-item {
				position: static;
				opacity: 100;
			}
			.carousel-item {
				-webkit-transition: opacity 0.6s ease-out;
				transition: opacity 0.6s ease-out;
			}
			#carousel-1:checked ~ .control-1,
			#carousel-2:checked ~ .control-2,
			#carousel-3:checked ~ .control-3 {
				display: block;
			}
			.carousel-indicators {
				list-style: none;
				margin: 0;
				padding: 0;
				position: absolute;
				bottom: 2%;
				left: 0;
				right: 0;
				text-align: center;
				z-index: 10;
			}
			#carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
			#carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
			#carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
				color: #2b6cb0;  /*Set to match the Tailwind colour you want the active one to be */
			}
        * {
            box-sizing: border-box;
            }

            /* Set a background color */
            body {
            background-color: #19529C;
            font-family: Helvetica, sans-serif;
            }

            /* The actual timeline (the vertical ruler) */
            .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            }

            /* The actual timeline (the vertical ruler) */
            .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: white;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            }

            /* Container around content */
            .container {
            padding: 10px 50px;
            position: relative;
            background-color: inherit;
            width: 50%;
            }

            /* The circles on the timeline */
            .container::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: #61D4E8;
            border: 4px solid #2DA1E7;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
            }

            /* Place the container to the left */
            .left {
            left: 0;
            }

            /* Place the container to the right */
            .right {
            left: 50%;
            }

            /* Add arrows to the left container (pointing right) */
            .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
            }

            /* Add arrows to the right container (pointing left) */
            .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
            }

            /* Fix the circle for containers on the right side */
            .right::after {
            left: -16px;
            }

            /* The actual content */
            .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            }

            /* Media queries - Responsive timeline on screens less than 600px wide */
            @media screen and (max-width: 600px) {
            /* Place the timelime to the left */
            .timeline::after {
                left: 31px;
            }

            /* Full-width containers */
            .container {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .container::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left::after, .right::after {
                left: 15px;
            }

            /* Make all right containers behave like the left ones */
            .right {
                left: 0%;
            }
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

                        toggleModal: false,
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