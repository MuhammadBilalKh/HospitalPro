<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                @foreach($headers as $key => $value)
                    <th>{{ $value }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>