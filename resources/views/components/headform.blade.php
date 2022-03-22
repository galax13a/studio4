<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div class="float-left">
                <h4 class="mr-2">
                {{$title}} </h4>
            </div>
            <div class="input-group input-group-lg">
                <input wire:model='keyWord' type="text" class="form-control input-lg" name="search" id="search" placeholder="{{$title_input}}">
            </div>
            <button class="btn-grad2 ml-2 shadow-sm " type="button" data-toggle="modal" data-target="#createDataModal"><strong>{{$title_btn}}</strong></button>
        </div>
    </div>
</div>
