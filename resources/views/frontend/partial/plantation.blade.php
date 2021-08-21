 <section class="producgrip csspadding">
        <div class="container">
            <div class="title text-center">
                <span class="h3">Plantation</span>
                <p>Plantation</p>
                <hr>
            </div>
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="row no-gutters">
                        @foreach ($plantation as $row)
                        <div class="col-md-6">
                            <a href="{{ $row->link }}" target="_blank"><img src="{{ asset('frontend/images/PlantationImage/'.$row->image) }}" alt="{{ $row->name }}" width="100%">
                            </a>
                        </div>
                         @endforeach
                    </div>
                </div>

                @foreach ($plantationright as $row)

                <div class="col-md-6">
                    <a href="{{ $row->link }}" target="_blank"><img src="{{ asset('frontend/images/PlantationRightImage/'.$row->image) }}" alt="{{ $row->name }}" width="100%">
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </section>