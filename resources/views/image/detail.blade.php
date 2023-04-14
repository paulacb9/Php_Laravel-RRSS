@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')

            <div class="card pub_image pub_image_detail">
                <div class="card-header">

                    @if($image->user->image)
                    <div class="container-avatar">
                        <img src="{{ route('user.avatar', ['filename'=>$image->user->image]) }}" class="avatar" />
                    </div>
                    @endif

                    <div class="data-user">
                        {{ $image->user->name.' '. $image->user->surname}}
                        <span class="nickname">
                            {{ ' | @'.$image->user->nick }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container image-detail">
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
                    </div>
                    <div class="description">
                        <span class="nickname"> {{'@'.$image->user->nick}} </span>
                        <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($image->created_at)}}</span>
                        <p>{{$image->description}}</p>
                    </div>
                    <div class="likes">
                        <!-- Comprobar si el usuario le dio like a la imagen-->
                        <?php $user_like = false; ?>

                        @foreach($image->likes as $like)
                            @if($like->user->id == Auth::user()->id)
                            <?php $user_like = true; ?>
                            @endif
                        @endforeach

                        @if(!$user_like)
                        <img src="{{asset('img/hearts-black.png')}}" data-id="{{$image->id}}" class="btn-like" />
                        @else
                        <img src="{{asset('img/hearts-red.png')}}" data-id="{{$image->id}}" class="btn-deslike" />
                        @endif
                        <span class="number_likes">{{count($image->likes)}}</span>
                    </div>

                    @if(Auth::user() && Auth::user()->id == $image->user->id)
                    <div class="action">
                        <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="btn btn-sm btn-primary">Actualizar</a>

                        <!-- <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-sm btn-danger">Borrar</a> -->
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                            Eliminar
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">¿Estas seguro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Si eliminas esta imagen nunca podrás recuperarla, ¿estas seguro de querer borrarla?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                        <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Borrar definitivamente</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="clearfix"></div>
                    <div class="comments">
                        <h4>Comentarios ({{count($image->comments)}})</h4>
                        <hr>

                        <form method="POST" action="{{ route('comment.save') }}">
                            @csrf

                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <p>
                                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : ' ' }}" name="content"></textarea>
                                @if($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </p>
                            <button type="submit" class="btn btn-success">
                                Comentar
                            </button>
                        </form>

                        <hr>

                        @foreach($image->comments as $comment)
                        <div class="comments_descr">
                            <span class="nickname"> {{'@'.$comment->user->nick}} </span>
                            <span class="nickname date">{{' | '.\FormatTime::LongTimeFilter($comment->created_at)}}</span>
                            <p>{{$comment->content}}<br>
                                @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>
                                @endif
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection