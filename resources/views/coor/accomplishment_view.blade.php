@foreach ($accomplishments as $accomplishment)
    @if ($accomplishment->status != null)
        <div class="row">
            <div class="col-md-6">
                <strong>Date Start:</strong>
                {{$accomplishment->date_start}}<br />
            </div>
            <div class="col-md-6">
                <strong>Date End:</strong>
                {{$accomplishment->date_end}}<br />
            </div>
            <div class="col-md-6">
                <strong>Hours Rendered:</strong>
                {{$accomplishment->hours_rendered}}<br />
            </div>
            <div class="col-md-12">
                <strong>Accomplishment:</strong><br />
                <?= urldecode($accomplishment->accomplishment) ?>
                <hr />
            </div>
        </div>
    @endif
@endforeach
