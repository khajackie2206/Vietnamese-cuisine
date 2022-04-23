
			  <div class="row isotope-grid">
                @foreach ($products as $key => $product)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2 product-cover">
						<div class="block2-pic hov-img0">
							<a href="/san-pham/{{$product->id}}-{{Str::slug($product->name)}}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size:16px;text-transform: uppercase;">
						    	<img src="{{$product->thumb}}" alt="{{$product->name}}" style="height: 200px;">
						    <a href="/san-pham/{{$product->id}}-{{Str::slug($product->name)}}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size:16px;text-transform: uppercase;">
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="/san-pham/{{$product->id}}-{{Str::slug($product->name)}}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-size:16px;text-transform: uppercase;">
									&nbsp;&nbsp; {{$product->name}}
								</a>
							@php
							  if($product->price_sale!=0){
							 echo "<span class='stext-105 cl3'>
								     &nbsp;&nbsp;
									<span style='color: lightgrey;text-decoration:line-through;'> ".number_format($product->price)." VNĐ</span> 
								</span> 
					
								<span class='stext-105 cl3' style>
									&nbsp;&nbsp;
									<span style='color: red;'>".number_format($product->price_sale)."</span> VNĐ
								</span>
								<span>
							 </span>
								";
							} else {
								echo "
								<span class='stext-105 cl3'>
									&nbsp;&nbsp;
									<span style='color: red;'>".number_format($product->price)."</span> VNĐ
								</span>
								<span class='stext-105 cl3'>
									<span> &nbsp;</span>
								</span>
								";
							}
						
							 @endphp
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>

		
         