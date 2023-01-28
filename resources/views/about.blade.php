@extends('start')

@section('title', 'About us')

@section('content')
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">About Us</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <h2>Featured title</h2>
                <p>Paragraph of text beneath the heading to explain the heading.
                    We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link d-inline-flex align-items-center">
                    Call to action
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                </a>
            </div>
            <div class="feature col">
                <h2>Featured title</h2>
                <p>Paragraph of text beneath the heading to explain the heading.
                    We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link d-inline-flex align-items-center">
                    Call to action
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                </a>
            </div>
            <div class="feature col">
                <h2>Featured title</h2>
                <p>Paragraph of text beneath the heading to explain the heading.
                    We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link d-inline-flex align-items-center">
                    Call to action
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                </a>
            </div>
        </div>
    </div>
@endsection
