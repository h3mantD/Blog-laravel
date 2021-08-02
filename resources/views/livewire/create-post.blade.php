<div>
    <form wire:submit.prevent = 'createPost'>
        title: <input type="text" wire:model="title"> <br>
        body:  <input type="text" wire:model="body"> <br>
        <input type="submit">
    </form>
</div>
