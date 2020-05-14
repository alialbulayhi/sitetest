@extends('layouts.app')
@section('title', __('Contact me'))
@section('content')

    @include('_partials._closed_alert')
    @if($errors->any())
<ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</ul>

@endif
    <p>{{__('Today: ')}} {{date('Y-m-d H:i:s')}}</p>

    @auth()
        <p>{{__('Welcome,')}} {{$user->name}}</p>
    @else
        <p>{{__('Welcome.')}}</p>
    @endauth
    <h4>
        {{$message}}
    </h4>
    @if(date('D' =='Tue'))
    <h6>
        {!! $info !!}
    </h6>
    @else
        <h6>{{__('Im ready to git your message')}}</h6>
    @endif

    <form action="" method="post">
     @csrf

    <div class="form-group">
        <input class="form-control" type="text" name="sender_name" placeholder="Your name">
    </div>
        <div class="form-group">
            <select name="option" id="option" class="form-control">
                @foreach($options as $key => $option)
                    <option value="{{$key}}">{{$option}}</option>
                @endforeach
            </select>


        </div>
    <div class="form-group">
        <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Your message"></textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">{{__('Send!!!!!')}}</button>
    </div>


</form>

@endsection
