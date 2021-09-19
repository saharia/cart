
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .checked {
  color: orange;
}
  </style>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
  <div class="container">
  <div class="row">
  <div class="col-md-4">
    <?php
      $options = [
        'high_low' => 'High to low',
        'low_high' => 'Low to high',
        'new' => 'Newest First',
        'rating' => 'Highest Rated'
      ];
      $sort =  Request::query('sort'); 
    ?>
    <select class="form-control" id='sort'>
      <option>Select</option>
      @foreach($options as $key => $value)
    <option value="{{ $key }}" {{ $key == $sort? 'selected': '' }}>{{ $value }}</option>
      @endforeach
    </select>
  </div>
  </div>

  <div class="row">
  <div class="col-md-12">

    {!! $products->appends(Request::except('page'))->render() !!}
  </div>
</div>
  <div class="row">
  @foreach($products as $key => $product)
    <div class="col-md-3" style="padding: 20px;cursor:pointer;">
      <img src="{{ count($product->images) ? asset('images/' . $product->images->first()->name) : asset('storage/images/default.png') }}" 
      style="width:100px;height: 100px;" />

      <p>
      <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
      </p>
      <p style="font-size: 18px;color: blue;">{{ $product->name }}</p>
      <p style="font-size: 18px;color: red;">${{ $product->price }}</p>
    </div>
    @endforeach
  </div>
</div>

</div>

<script>
  $(document).ready(() => {
    let page = "<?php echo isset($_GET['page']) ? $_GET['page'] : null; ?>";
    let currentUrl = "<?php echo url()->current(); ?>";
    $(document).on('change', '#sort', (e) => {
      let ele = $(e.target);
      if(ele.val().length) {
        let query = [];
        query.push('sort=' + ele.val());
        if(page.length) {
          query.push('page=' + page);
        }
        let url = currentUrl + '?' + query.join('&');
        location.replace(url)
      }
    });
  })
</script>