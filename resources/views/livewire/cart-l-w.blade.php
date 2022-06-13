<div>
    @foreach($cart as $item)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div class="row">
                <div class="col-3">
                    <img class="card-img-top img-thumbnail" src="{{$item['product_image'] ? asset('img/products' . $item['product_image']) : 'http://via.placeholder.com/400'}}" alt="">
                </div>
                <div class="col-9">
                    <div>
                        <h6 class="my-0">{{$item['product_name']}}</h6>
                        <small class="text-muted">{{Str::limit($item['product_body'],30)}}</small>
                    </div>
                    <form method="POST" action="{{action('App\Http\Controllers\FrontEndController@updateQuantity')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input class="form-control" type="hidden" name="id" value="{{$item['product_id']}}">
                        <div class="d-flex justify-content-between">
                            <input class="form-control me-2" type="number" name="quantity" value="{{$item['quantity']}}" min="1" max="100">
                            <button class="btn btn-outline-success btn-sm me-2" type="submit"><i class="fas fa-recycle"></i></button>
                            <a class="btn btn-outline-danger btn-sm p-2" href="{{route('removeItem',$item['product_id'])}}"><i class="fas fa-times-circle"></i></a>
                        </div>

                    </form>
                    <span class="text-muted">&euro; {{$item['product_price']}}</span>
                </div>
            </div>
        </li>
    @endforeach
</div>
