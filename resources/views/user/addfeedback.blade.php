@extends('layouts.app')
@section('content')


 <section class="content-main">
                <div class="row">
                    <div class="col-12">
                        <div class="content-header">
                            <h2 class="content-title">Add New Feedback</h2>
                            <div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Fill details to submit feedback</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/storefeedback') }}" method="post">
                                @csrf
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Title</label>
                                        <input type="text" placeholder="Type here" class="form-control" name="title" id="title" />
                                         @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" placeholder="Type here" class="form-control" rows="4"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                     <div class="mb-4">
                                       
                                        <label class="form-label">Category</label>
                                            <select class="form-select" name="category">
                                                <option value="Bug report">Bug report</option>
                                                <option value="Feature request">Feature request</option>
                                                <option value="Improvement">Improvement</option>
                                            </select>
                                            @error('category')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                            <button type="submit" class="btn btn-md rounded font-sm hover-up" style="float: right;">Publish</button>
                               
                                </form>
                            </div>
                        </div>
                       
                    </div>
                   
                </div>
            </section>


@endsection