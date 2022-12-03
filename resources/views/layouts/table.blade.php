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
        </tr>
      </thead>
      <tbody>
        @if ($transactions->count())
          @foreach ( $transactions as $transaction)
          <tr class="text-center">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $transaction->category->name }}</td>
              <td class="text-start">{{ $transaction->description }}</td>
              <td>{{ $transaction->type == 'income' ? number_format($transaction->amount, 2,",",".") : '-' }}</td>
              <td>{{ $transaction->type == 'expense' ? number_format($transaction->amount, 2,",",".") : '-' }}</td>
              <td>{{ $transaction->date }}</td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="6" class="text-center">No data available</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>