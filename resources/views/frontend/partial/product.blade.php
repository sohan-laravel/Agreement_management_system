    <section class="Packaging csspadding pb-3">
        <!-- Product -->
        <div class="container hover_effects">
            <!-- Title -->
            <div class="title text-center">
                <span class="h3">Farmer Market</span>
                <p>Best Suitable Product of farmer in lowest price</p>
                <hr>
            </div>
            <!-- Product -->
            <div class="row mb-3">
                <!-- one by one product -->

                @foreach ($product as $row)

                <div class="col-md-3">
                    <div class="card text-center cards_design">
                        <img src="{{ asset('frontend/images/ProductImage/'.$row->image) }}" alt="{{ $row->name }}>
                        <span class="h3 mt-3">{{ $row->name }}</span>
                        <p class="px-3">Price: {{ $row->price }}</p>
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </section>