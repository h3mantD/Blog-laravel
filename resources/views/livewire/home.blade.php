<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h1>first livewire component</h1>
    <p style="cursor: pointer" 
        wire:click="$set('component', 'login')"
    > login </p> 
    <p style="cursor: pointer" 
        wire:click="$set('component', 'register')"
    > register </p>
    <p style="cursor: pointer" 
        wire:click="$set('component', 'posts')"
    > posts </p>
    <hr>
    <div x-data= "{counter: 0}">
      <button @click="counter++">+</button>
      <p x-text="counter"></p>
      <button @click="counter--">-</button>
      <button @click="counter=0">reset</button>
    </div>
    <hr>

    <div x-data= "{componentName: ''}">

        <p style="cursor: pointer" 
            @click="
                componentName = 'login'; 
                @this.set('component', componentName);
                "
        > Login </p>
        <p style="cursor: pointer" 
            @click="
                componentName = 'register'; 
                @this.set('component', componentName);
                "
        > Register </p>
        <input type="text" wire:model="component" x-model="componentName">
        <p x-text="componentName" ></p> : <strong>{{ $component }}</strong>

        <p @click="alert('this is the alert')">testing</p>
        <hr> 
        <div x-show="componentName == 'login'">
            <livewire:login />
        </div>
        <template x-if="componentName == 'register'">
            <livewire:register />
        </template>
    </div>


    <hr>
    {{-- @if ($component === 'login')
        @livewire('login')
    @elseif ($component === 'register')
        @livewire('register')
    @elseif ($component === 'posts')
        @livewire('post-grid')
    @endif --}}

</div>
