@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">{{ __('Vaccine registration') }}</h4>

                <div class="card-body d-flex flex-column text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi consectetur consequatur consequuntur exercitationem hic id iusto laboriosam maxime molestias natus necessitatibus nostrum optio possimus similique veniam, voluptates. Dolorem, ducimus.</span><span>Ad blanditiis commodi culpa, dicta dolore eaque enim error esse eum explicabo illum impedit in incidunt ipsam laborum molestias neque pariatur possimus, quas quia quod repellendus repudiandae sequi sit suscipit.</span><span>Animi aperiam assumenda atque culpa cum deleniti earum eum ex hic ipsam iure labore libero maiores maxime, minus, mollitia perferendis quaerat quam quidem quis recusandae similique sunt tempore totam vitae.</span><span>Aut et iure maiores molestias, odio sunt veniam! Ab accusantium autem doloremque, doloribus eveniet ex, ipsum iure magnam molestias quaerat quos recusandae ut veniam voluptas voluptate? Autem ea iusto mollitia?</span>
                    <a href="{{route('appointments.create')}}" class="btn btn-success mt-2 font-weight-bolder">Click here to register for vaccine appointment</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
