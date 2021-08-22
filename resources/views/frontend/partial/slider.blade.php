<section>
   
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height:600px;">

    @foreach ($slider as $row)

    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
      <img class="d-block w-100" style="height:600px;" src="{{ asset('frontend/images/SliderImage/'.$row->image) }}" alt="{{ $row->name }}">
    
    <div class="carousel-caption  hero_text text-white ml-5" style="width: 800px;">
                <h1 style="font-size: 40px; font-weight: 800;">Welcome to Agriculture Management System</h1>

            </div>
    
    </div>

    

    @endforeach
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    </section>