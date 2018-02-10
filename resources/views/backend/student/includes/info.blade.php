<div class="box box-primary">
    <div class="box-body">
        <img src="{{ URL::to('/') }}/img/student.png" class="profile-user-img img-responsive img-circle" />
        <h3 class="profile-username text-center">{{ $student->name }}</h3>
        <p class="text-center">{{ trans('strings.backend.student.joined_on', ['date' => $student->created_at->format('j M Y')]) }}</p>

        @if(isset($student->parent))
        <hr>
        <h4>{{ trans('labels.backend.student.parent') }}</h4>
        <div class="post">
            <div class="user-block">
                <img src="{{ URL::to('/') }}/img/student.png" class="img-circle img-bordered-sm" />
                <span class="username">{{ $student->parent->name }}</span>
                <span class="description">{{ $student->parent->email }}</span>
            </div>
        </div>
        @endif
    </div><!-- /.box-body -->
</div><!--box-->

<div class="box box-primary collapsed-box">
    <div class="box-header">
        <i class="fa fa-users"></i>
        <h3 class="box-title">{{ trans('labels.backend.student.batches') }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        @if($student->batches)
        <ul class="list-group list-group-unbordered">
            @foreach($student->batches as $batch)
            <li class="list-group-item">
                {{ link_to_route('admin.batches.show', $batch->name, ['id' => $batch->id]) }}
                <span class="pull-right text-muted">{{ $batch->course->name }}</span>
            </li>
            @endforeach
        </ul>
        @endif
    </div><!-- /.box-body -->
</div><!--box-->
