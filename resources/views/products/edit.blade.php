@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">商品情報編集画面</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3 row">
                                <label for="product_id" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <div class="form-control-plaintext" id="product_id">{{ $product->id }}</div>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="product_name" class="col-sm-2 col-form-label">商品名 <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                                    @if ($errors->has('product_name'))
                                        <div class="text-danger">
                                            {{ $errors->first('product_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="company_id" class="col-sm-2 col-form-label">メーカー名 <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="company_id" name="company_id">
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $product->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_id'))
                                        <div class="text-danger">
                                            {{ $errors->first('company_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="price" class="col-sm-2 col-form-label">価格 <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                                    @if ($errors->has('price'))
                                        <div class="text-danger">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="stock" class="col-sm-2 col-form-label">在庫数 <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                                    @if ($errors->has('stock'))
                                        <div class="text-danger">
                                            {{ $errors->first('stock') }}
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="comment" class="col-sm-2 col-form-label">コメント</label>
                                <div class="col-sm-10">
                                    <textarea id="comment" name="comment" class="form-control" rows="3">{{ $product->comment }}</textarea>
                                    @if ($errors->has('comment'))
                                        <div class="text-danger">
                                            {{ $errors->first('comment') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="img_path" class="col-sm-2 col-form-label">商品画像</label>
                                <div class="col-sm-10">
                                    <input id="img_path" type="file" name="img_path" class="form-control">
                                    <img src="{{ asset($product->img_path) }}" alt="商品画像" class="product-image mt-2">
                                    @if ($errors->has('img_path'))
                                        <div class="text-danger">
                                            {{ $errors->first('img_path') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">更新</button>
                            <a href="{{ route('products.show' , $product->id ) }}" class="btn btn-primary mt-1 mb-1">戻る</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
