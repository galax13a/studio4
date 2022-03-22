<div>
    <div class="btn-group btn-group-toggle" >
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <a type="button" class="btn-grad-close p-2 shadow-lg close-btn d-none" data-dismiss="modal"> <strong> Close</strong></a>
    @if (trim($mode)=="0")
   <a  wire:loading.attr="disabled" wire:target="store" class="btn-grad3 p-2 shadow-sm close-modal" wire:click.prevent="store"><strong>{{$title_btn}}</strong></a>
    @else <a  wire:click.prevent="update" class="btn-grad3   shadow-sm" data-dismiss="modal"><strong>{{$title_btn}}</strong></a>
   @endif
</div>
</div>

<style>


</style>