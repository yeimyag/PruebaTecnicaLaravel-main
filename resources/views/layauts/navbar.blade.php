
    <header>
        <form action="/logout">
            <h1 class="text_name">{{__('Welcome')}} {{auth()->user()->name }}</h1>
            <button>{{__('Logout')}}</button>
        </form>
        
    </header>

    