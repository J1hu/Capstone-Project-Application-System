<form method="POST" action="{{ route('batch.massAssign') }}">
    @csrf

    <label for="batch_id">Select batch:</label>
    <select id="batch_id" name="batch_id">
        @foreach ($batches as $batch)
        <option value="{{ $batch->id }}">{{ $batch->batch_num }}</option>
        @endforeach
    </select>

    <hr>

    <label>Select applicants:</label>
    <br>
    @foreach ($applicants as $applicant)
    <input type="checkbox" id="applicant_{{ $applicant->id }}" name="applicant_ids[]" value="{{ $applicant->id }}">
    <label for="applicant_{{ $applicant->id }}">{{ $applicant->full_name }}</label>
    <br>
    @endforeach

    <hr>

    <button type="submit">Assign Batch</button>
</form>