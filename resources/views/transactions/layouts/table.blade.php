<div class="mt-2">
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Income (Rp)</th>
          <th scope="col">Expense (Rp)</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        {{-- Summary --}}
        {{-- @foreach ( auth()->user()->transactions()->orderBy('created_at', 'desc')->paginate(5) as $transaction) --}}
        @foreach ( $transactions as $transaction)
        <tr class="text-center">
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $transaction->category->name }}</td>
            <td class="text-start">{{ $transaction->description }}</td>
            <td>{{ $transaction->type == 'income' ? number_format($transaction->amount, 2,",",".") : '-' }}</td>
            <td>{{ $transaction->type == 'expense' ? number_format($transaction->amount, 2,",",".") : '-' }}</td>
            <td>{{ $transaction->date }}</td>
            <td>
              @if (isset($transaction))
                <a href="../../transactions/{{ $transaction->id }}/edit"><span class="btn btn-sm text-bg-warning">Edit</span></a>
              @else
                <a href="/transactions/{{ $transaction->id }}/edit"><span class="btn btn-sm text-bg-warning">Edit</span></a>
              @endif
              <form action="/transactions/{{ $transaction->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="border-0 p-0 ms-1" onclick="return confirm('Are you sure?')"><span class="btn btn-sm text-bg-danger">Delete</span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $transactions->links() }}
  </div>
</div>