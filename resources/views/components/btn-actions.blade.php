<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <div class="btn-group">
    <button data-toggle="modal" data-target="#updateModal"  wire:click="edit({{$id_row}})" class="btn btn-success p-1 ">✔️</button>
    <button onclick="confirm('Confirm Delete  id {{$id_row}}? \n se va a eliminar ! ')||event.stopImmediatePropagation()" wire:click="destroy({{$id_row}})" class="btn btn-danger p-1">➖</button>
    </div>
</div>