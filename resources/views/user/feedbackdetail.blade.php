@extends('layouts.app')
  
@section('content')
  <section class="content-main">
                
                <div class="card">
                    <header class="card-header">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                             <h4 class="content-title card-title">Title: {{$feedbackdetail->title}}</h4>
                                <span> <i class="material-icons md-calendar_today"></i> <b>{{ Carbon\Carbon::parse($feedbackdetail->created_at)->format('d M Y') }}</b> </span> <br />
                                 <p>Details for Feedback ID: {{$feedbackdetail->id}}</p>
                                  
                                    </br></br>
                                  <p><b>Message:</b> {{$feedbackdetail->description}}</p>
                            </div>
                          
                        </div>
                    </header>
                    <!-- card-header end// -->
                    <div class="card-body">
                     
                      
                        <div class="row">
                            <div class="col-lg-7">
                            
                             @foreach($comments as $comment)
                                <article class="icontext align-items-start">
                                    <span class="icon icon-sm rounded-circle bg-primary-light">
                                        <i class="text-primary material-icons md-person"></i>
                                    </span>
                                    <div class="text">
                                        <h6 class="mb-1">{{$comment->username}}</h6>
                                        <p class="mb-1">
                                            {{ Carbon\Carbon::parse($comment->created_at)->format('d M Y') }} <br />
                                            <br />
                                            {{$comment->comment}}
                                        </p>
                                     
                                    </div>
                                </article>
                                </br></br></br>
                             @endforeach
                                

                            </div>
                            <!-- col// -->
                            <div class="col-lg-1"></div>
                            <div class="col-lg-4">
                              
                                <div class="h-25 pt-4">
                                    <div class="mb-3">
                                        <label>Comments</label>
                                        <textarea class="form-control" name="notes" id="notes" placeholder="What's in your mind"></textarea>
                                    </div>
                                    <button class="btn btn-primary">Post</button>
                                </div>
                            </div>
                            <!-- col// -->
                        </div>
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
            </section>
@endsection