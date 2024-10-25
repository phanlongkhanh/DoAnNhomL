@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

@if ($errors->has('description'))
    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
@endif

<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Check</th>
          <th>Time</th>
          <th>Update</th>
          <th>Action</th>
        </tr>
        @if(isset($productTypes))
            @foreach ($productTypes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>       
                    <td>{{ $item->description  }}</td>

                    <td>
                        @if ($item->checkactive == 1)
                            <a href="{{ route('active-product-type', $item->id) }}" class="label label-info status-active">Show</a>
                        @else
                            <a href="{{ route('active-product-type', $item->id) }}" class="label label-default status-active">Hide</a>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ url('edit-producttype', ['id' => Crypt::encrypt($item->id)]) }}" class="btn btn-xs btn-primary" onclick="return confirm('Bạn có chắc muốn sửa không ?')">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <form action="{{ route('remove-product-type', $item->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger"
                                onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i
                                    class="fa fa-trash"></i> Delete</button>
                        </form>          
                    </td>
                </tr>
            @endforeach
        @endif
      </tbody>
    </table>
    {{-- {!! $type_products->appends($query ?? [])->links() !!} --}}
    <div id="pageNavPosition" class="text-right">
      <ul class="pagination">
          <!-- Hiển thị link đến trang trước (Previous Page) -->
          {{-- @if ()
              <li class="disabled"><span>&laquo;</span></li>
          @else
              <li><a href="#" rel="prev">&laquo;</a></li>
          @endif --}}
  
          <!-- Hiển thị các số trang đã có -->
          {{-- @for ($i = 1; $i <= $producttypes->lastPage(); $i++)
              <li class="{{ $i == $producttypes->currentPage() ? 'active' : '' }}">
                  <a href="{{ $producttypes->url($i) }}">{{ $i }}</a>
              </li>
          @endfor --}}
          <!-- Hiển thị link đến trang tiếp theo (Next Page) -->
          {{-- @if ($producttypes->hasMorePages())
              <li><a href="{{ $producttypes->nextPageUrl() }}" rel="next">&raquo;</a></li>
          @else
              <li class="disabled"><span>&raquo;</span></li>
          @endif --}}
      </ul>
  </div>
  </div>
