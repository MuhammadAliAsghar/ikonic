@extends('layouts.app')
  
@section('content')
 <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Feedbacks</h2>
                        <p>All feedbacks are here!</p>
                    </div>
                    <div>
                        <a href="{{ route('addfeedback')}}" class="btn btn-md rounded font-sm">Add New Feedback</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <header class="card-header">
                        <div class="row gx-3">
                            <div class="col-lg-4 col-md-6 me-auto">
                                <input type="text" placeholder="Search..." class="form-control" />
                            </div>
                            
                            <div class="col-lg-2 col-md-3 col-6">
                                <select class="form-select">
                                    <option>Show 20</option>
                                    <option>Show 30</option>
                                    <option>Show 40</option>
                                </select>
                            </div>
                        </div>
                    </header>
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </th>
                                        <th>#ID</th>
                                        <th>Votes</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($allfeedbacks as $feedback)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </td>
                                        <td>{{ $feedback->id }}</td>
                                          <td>{{ $feedback->vote_count }}</td>
                                        <td><b>{{ $feedback->title }}</b></td>
                                        <td>{{ $feedback->description }}</td>
                                         <td>{{ $feedback->category }}</td>

                                        <td>  @php
                                                    $getuservote = DB::table('votes')->where('userid' , Auth::user()->id)->where('votefor' , $feedback->id)->first();
                                            @endphp
                                           @if ($getuservote)
                                                <span class="badge rounded-pill alert-success">Voted</span>
                                            @else
                                               <span class="badge rounded-pill alert-warning">Not voted yet</span>

                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($feedback->created_at)->format('d M Y') }}</td>
                                        <td class="text-end">

                                              <form method="POST" action="{{ route('feedbackdetail') }}">
                                                    @csrf
                                                    <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
                                                    <button type="submit" class="btn btn-md rounded font-sm">View details</button>
                                                </form>

                                        </td>
                                    </tr>
                                 @endforeach
                                  
                               
                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive//end -->
                    </div>
                    <!-- card-body end// -->
                </div>
              
            </section>
@endsection