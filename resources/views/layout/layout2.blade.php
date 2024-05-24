<nav class="bg-gradient-to-r from-indigo-600 to-purple-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white font-semibold text-lg">
            My Awesome Blog
        </a>
        <ul class="flex space-x-4">
            <li>
                <a href="/" class="text-gray-300 hover:text-white">Home</a>
            </li>
            <li>
                <a href="/blog" class="text-gray-300 hover:text-white">Blog</a>
            </li>
            @auth
            <li>
                <a href="/blog/myposts" class="text-gray-300 hover:text-white">Profile</a>
            </li>
            <li>
                <a href="/logout" class="text-gray-300 hover:text-white">Logout</a>
            </li>
            <li>
                <div class="text-yellow-500 ">{{auth()->user()->name}}</div>
            </li>
            @endauth
            @guest
            <li>
                <a href="/login" class="text-gray-300 hover:text-white">Login</a>
            </li>
            @endguest
          
        </ul>
    </div>
</nav>


      @yield('items')

      
<script src="https://cdn.tailwindcss.com"></script>