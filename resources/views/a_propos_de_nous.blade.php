@extends('template.template')

@section('title')
À propos de nous
@endsection

@section('content')
<section class="about_section layout_padding mt-5 mb-5">
    <div class="container">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="images/about-img.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Qui sommes-nous ?
                        </h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa numquam reiciendis ea excepturi
                        vero expedita at commodi sed voluptatibus accusantium culpa error ratione iure aspernatur,
                        asperiores dicta eius suscipit labore.Officiis fuga, vero debitis dolore architecto voluptatem,
                        ab quis reiciendis cupiditate doloremque in nam qui aliquid illum voluptate et voluptas
                        necessitatibus atque quidem libero. Est laboriosam impedit iusto harum provident?
                    </p>
                    <a href="">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

