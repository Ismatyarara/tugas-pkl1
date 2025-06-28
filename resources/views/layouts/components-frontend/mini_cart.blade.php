<section class="minicart">
    <div class="minicart__inner">
        <div class="minicart__wrapper">

            <!-- Header -->
            <div class="minicart_close_icon d-flex justify-content-between align-items-center mb-3">
                <div class="minicart_cart_text">
                    <strong>Cart</strong>
                </div>
                <button class="minicart_close_btn" style="background: none; border: none;">
                    <i class="fa fa-close"></i>
                </button>
            </div>

            <!-- Cart Items -->
            <div class="minicart_single_wrapper">
                @forelse ($cartItems as $item)
                    @if ($item->product)
                        <div class="minicart__single d-flex mb-3">
                            <!-- Image -->
                            <div class="minicart_single_img me-2">
                                <a href="{{ route('product.show', $item->product->slug) }}">
                                    <img src="{{ Storage::url($item->product->image) }}"
                                         alt="{{ $item->product->name }}"
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                </a>
                            </div>

                            <!-- Content -->
                            <div class="minicart_single_content flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ route('product.show', $item->product->slug) }}">
                                        {{ $item->product->name }}
                                    </a>
                                </h6>
                                <span>{{ $item->qty }} x 
                                    <span class="money">Rp {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                </span>
                            </div>

                            <!-- Remove Button -->
                            <div class="minicart_single_close ms-2">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Remove" style="background: none; border: none;">
                                        <i class="fa fa-close text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="text-center p-3">Keranjang kosong</p>
                @endforelse
            </div>

            <!-- Total -->
            @php
                $total = $cartItems->sum(fn($item) => $item->product ? $item->qty * $item->product->price : 0);
            @endphp

            <div class="minicart__footer border-top pt-3 mt-3">
                <div class="minicart__subtotal d-flex justify-content-between mb-2">
                    <span class="subtotal__title">Subtotal:</span>
                    <span class="subtotal__amount">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="minicart__button d-flex flex-column gap-2">
                    <a href="{{ route('cart.index') }}" class="default__button btn btn-outline-dark">View Cart</a>
                    <a href="{{ route('cart.checkout') }}" class="default__button btn btn-dark">Checkout</a>
                </div>
                <div class="cart_note_text mt-2 text-muted small">
                    <p>Free Shipping on All Orders Over Rp 1.500.000!</p>
                </div>
            </div>

        </div>
    </div>
</section>
