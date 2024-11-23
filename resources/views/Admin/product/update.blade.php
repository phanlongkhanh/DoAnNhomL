@extends('ControllerAdmin.dashboard_admin')
@section('content')
    <section class="content-header">
        <h1>
            Product
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Product</a></li>
            <li class="active">Update</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (isset($product))
            <form action="{{ route('products.update', $product->id_product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-7">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="pro_name">Name</label>
                                <input type="text" name="id_product" value="{{ $product->id_product }}" hidden>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="pro_price">Giá</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                                    <span class="input-group-addon"></span>
                                </div>
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pro_sale">% Giảm Giá</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" name="discount" class="form-control" value="{{ old('discount', $product->discount) }}">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                </div>
                                @error('discount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Danh Mục (*)</label>
                                <select name="category_id" class="form-control js-check-type" id="category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Type Product (*)</label>
                                <select name="typeproduct_id" class="form-control js-type-product" id="product_type_id" required>
                                    @foreach($productTypes as $productType)
                                        <option value="{{ $productType->id }}" {{ old('typeproduct_id', $product->typeproduct_id) == $productType->id ? 'selected' : '' }}>{{ $productType->name }}</option>
                                    @endforeach
                                </select>
                                @error('typeproduct_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Supplier (*)</label>
                                <select name="supplier_id" id="supplier_id" class="form-control js-type-product" required>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="box box-warning">
                                    <div class="box-header">
                                        <h3 class="box-title">Thuộc Tính</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group col-sm-6">
                                            <label>Số Lượng</label>
                                            <input type="number" name="amount" class="form-control" value="{{ old('amount', $product->amount) }}">
                                            @error('amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ảnh Đại Diện</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Ảnh Mới</label>
                                <div style="margin-bottom:10px">
                                    <img id="image_preview_container" src="{{ asset('images/' . $product->image) }}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                                </div>
                                <input type="file" name="image" id="image" class="js-upload">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box-footer" style="text-align: center;">
                        <a href="{{ url('product') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </section>
    <!-- /.content -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>
@endsection

@section('script')
    <script>
        $(function() {
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            // run js-select2-keyword
            if ($('.js-select2-keyword').length > 0) {
                $('.js-select2-keyword').select2({
                    placeholder: 'Chọn Keyword',
                    maximumSelectionLength: 3
                });
            }

            $('.js-check-type').change(function() {
                let $this = $(this);
                let idCategory = this.value;
                let URL = $this.attr('data-url') + '/' + idCategory;
                if (URL) {
                    $.ajax({
                        url: URL,
                        success: function(results) {
                            $('.js-type-product').html(results.type_product);
                            $('.js-attribute').html(results.attribute);
                        },
                        error: function(error) {
                            console.log(error.messages);
                        }
                    });
                }
            });
        });
    </script>
@endsection
