<template>
        <div class="bg-gray-100 overflow-x-hidden">
        <GuestNavbar/>
            <div class="px-6 py-8">
                <div class="flex justify-between container mx-auto">
                    <div class="w-full lg:w-8/12">
                        <div class="flex items-center justify-between">
                        
                            <!--New Post Button-->
                            <Button>New Post</Button>
                            
                            <div>
                                <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option>Latest</option>
                                    <option>Last Week</option>
                                </select>
                            </div>
                        </div>
                        <div v-for="twitte in twittes.data " :key="twittes.id"class="mt-6">
                            <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                                <div class="flex justify-between items-center"><span class="font-light text-gray-600">Jun 1,
                                        2020</span><a href="#"
                                        class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">Laravel</a>
                                </div>
                                <div class="mt-2"><a href="#" class="text-2xl text-gray-700 font-bold hover:underline">{{twitte.title}}</a>
                                    <p class="mt-2 text-gray-600">{{twitte.body}}</p>
                                </div>
                                <div class="flex justify-between items-center mt-4"><a href="#"
                                        class="text-blue-500 hover:underline">Read more</a>
                                    <div><a href="#" class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                                alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                            <h1 class="text-gray-700 font-bold hover:underline">User</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="mt-8">
                            <div class="flex">
                                <a v-for="(link, key) in twittes.links" :href="link.url"  class="mx-1 px-3 py-2 bg-white text-gray-700 font-medium hover:bg-blue-500 hover:text-white rounded-md">
                                    {{link.label}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-8 w-4/12 hidden lg:block">
                        <div class="px-8">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                            <div class="flex flex-col bg-white max-w-sm px-6 py-4 mx-auto rounded-lg shadow-md">
                                <ul class="-mx-4">
                                    <li class="flex items-center"><img
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">
                                        <p><a href="#" class="text-gray-700 font-bold mx-1 hover:underline">Alex John</a><span
                                                class="text-gray-700 text-sm font-light">Created 23 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                            alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">
                                        <p><a href="#" class="text-gray-700 font-bold mx-1 hover:underline">Jane Doe</a><span
                                                class="text-gray-700 text-sm font-light">Created 52 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                            alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">
                                        <p><a href="#" class="text-gray-700 font-bold mx-1 hover:underline">Lisa Way</a><span
                                                class="text-gray-700 text-sm font-light">Created 73 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                            alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">
                                        <p><a href="#" class="text-gray-700 font-bold mx-1 hover:underline">Steve Matt</a><span
                                                class="text-gray-700 text-sm font-light">Created 245 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                            alt="avatar" class="w-10 h-10 object-cover rounded-full mx-4">
                                        <p><a href="#" class="text-gray-700 font-bold mx-1 hover:underline">Khatab
                                                Wedaa</a><span class="text-gray-700 text-sm font-light">Created 332 Posts</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-10 px-8">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                            <div class="flex flex-col bg-white px-4 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                                <ul>
                                    <li><a href="#" class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                            AWS</a></li>
                                    <li class="mt-2"><a href="#"
                                            class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                            Laravel</a></li>
                                    <li class="mt-2"><a href="#"
                                            class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">- Vue</a>
                                    </li>
                                    <li class="mt-2"><a href="#"
                                            class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                            Design</a></li>
                                    <li class="flex items-center mt-2"><a href="#"
                                            class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">-
                                            Django</a></li>
                                    <li class="flex items-center mt-2"><a href="#"
                                            class="text-gray-700 font-bold mx-1 hover:text-gray-600 hover:underline">- PHP</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-10 px-8">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                            <div class="flex flex-col bg-white px-8 py-6 max-w-sm mx-auto rounded-lg shadow-md">
                                <div class="flex justify-center items-center"><a href="#"
                                        class="px-2 py-1 bg-gray-600 text-sm text-green-100 rounded hover:bg-gray-500">Laravel</a>
                                </div>
                                <div class="mt-4"><a href="#" class="text-lg text-gray-700 font-medium hover:underline">Build
                                        Your New Idea with Laravel Freamwork.</a></div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="flex items-center"><img
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="w-8 h-8 object-cover rounded-full"><a href="#"
                                            class="text-gray-700 text-sm mx-3 hover:underline">Alex John</a></div><span
                                        class="font-light text-sm text-gray-600">Jun 1, 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Footer/>
         </div>
   
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'
    //import Welcome from '@/Jetstream/Welcome'
    import GuestNavbar from '@/Jetstream/GuestNavbar'
    import Footer from '@/Jetstream/Footer'

 export default {

    

      props:{
           twittes: Object,
      },

       components: {
             
             GuestNavbar,
             Footer
        },

 }
 </script>