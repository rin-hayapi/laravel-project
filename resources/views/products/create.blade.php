@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">商品新規登録画面</h1>


    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

        @csrf



        <div class="mb-3 row">
            <label for="product_name" class="col-sm-2 col-form-label">商品名 <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input id="product_name" type="text" name="product_name" class="form-control" required>
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
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
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
                <input id="price" type="text" name="price" class="form-control" required>
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
                <input id="stock" type="text" name="stock" class="form-control" required>
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
                <textarea id="comment" name="comment" class="form-control" rows="3" ></textarea>
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
                @if ($errors->has('img_path'))
                    <div class="text-danger">
                        {{ $errors->first('img_path') }}
                    </div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">新規登録</button>
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-0">戻る</a>
    </form>


</div>
@endsection
