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
          <th class="text-center">Name</th>
          <th>Image</th>
          <th class="text-center">Description</th>
          <th>Active</th>
          <th>Time</th>
          <th>Update</th>
          <th>Action</th>
        </tr>
        @if(isset($transports))
            @foreach ($transports as $item)
                <tr>
                    <td class="text-center h4" style="line-height: 100px;">{{ $item->id }}</td>
                    <td class="text-center align-middle" style="height: 100px;"><div class="font-weight-bold h4 text-danger" style="line-height: 100px;">{{ $item->name }}</div></td>
                    <td><img src="transport-image/<?= $item->image ?>" alt="" width="200px" height="150px"></td>
                    <td class="text-center align-middle" style="height: 100px;"><div style="line-height: 100px;">{{ $item->description }}</div></td>
                    <td>
                        @if ($item->checkactive == 1)
                            <a href="#" class="label label-info status-active" style="line-height: 100px;" >Show</a>
                        @else
                            <a href="#" class="label label-default status-active" style="line-height: 100px;">Hide</a>
                        @endif
                    </td>
                  
                    <td style="line-height: 100px;">{{ $item->created_at }}</td>
                    <td style="line-height: 100px;">{{ $item->updated_at }}</td>
                    <td style="line-height: 100px;">
                        <a href="{{ url('editProductType', ['id' => $item->id_producttype]) }}" class="btn btn-xs btn-primary" onclick="return confirm('Bạn có chắc muốn sửa không')"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="{{ url('deleteproducttype', ['id' => $item->id_producttype]) }}" class="btn btn-xs btn-danger js-delete-confirm" onclick="return confirm('Bạn có chắc muốn xoá không')"><i class="fa fa-trash"></i> Delete</a>
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
