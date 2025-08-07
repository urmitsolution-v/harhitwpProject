@extends('layout.admin')
@section('title', 'Api Documents - ')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-4">API Documentation</h4>
                        <div class="accordion" id="apiAccordion">
                            @php
                                $apis = [
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/main-menus',
                                        'description' => 'Fetch all main menu items.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/sub-menus/{menu_id}',
                                        'description' => 'Fetch submenus for a specific main menu.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/page/{slug}',
                                        'description' => 'Get CMS page by slug.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/blogs',
                                        'description' => 'Get all blog listings.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/blog-categories',
                                        'description' => 'Fetch all blog categories.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/blogs/search?query=example',
                                        'description' => 'Search blogs by query string.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/blogs/by-category?category_id=1',
                                        'description' => 'Get blogs by category ID.',
                                    ],
                                    [
                                        'method' => 'POST',
                                        'endpoint' => '/api/contactus-enquiry',
                                        'description' => 'Submit the contact enquiry form.',
                                        'request_example' => [
                                            'name' => 'John Doe',
                                            'email' => 'john@example.com',
                                            'phone' => '9876543210',
                                            'message' => 'Hello, I have a query.'
                                        ]
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/blog/{slug}',
                                        'description' => 'Get blog details by slug.',
                                    ],
                                    [
                                        'method' => 'GET',
                                        'endpoint' => '/api/who-we-are',
                                        'description' => 'Get “Who We Are” page content.',
                        ],
                        [
    'method' => 'GET',
    'endpoint' => '/api/teams',
    'description' => 'Get all active team members with status "Y". Each team member includes full image URL.',
],
[
    'method' => 'GET',
    'endpoint' => '/api/team/{slug}',
    'description' => 'Get details of a specific team member by slug, only if status is "Y". Includes full image URL.',
],
[
    'method' => 'GET',
    'endpoint' => '/api/banners',
    'description' => 'Home Page Banners',
],
[
    'method' => 'GET',
    'endpoint' => '/api/insights',
    'description' => 'Insights Page ',
],
[
    'method' => 'GET',
    'endpoint' => '/api/insights-home',
    'description' => 'Insights Home Page ',
],
[
    'method' => 'GET',
    'endpoint' => '/api/insights-detail-page/what-we-learned-from-talking-to-local-tech-companies-about-digital-public-goods',
    'description' => 'Insight View Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/home-blogs',
    'description' => 'Home Page Blogs',
],
[
    'method' => 'GET',
    'endpoint' => '/api/career',
    'description' => 'About Us Career Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/investments',
    'description' => 'About Us Investments Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/publications',
    'description' => 'Resources Publications Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/impact-stories',
    'description' => 'Impact Stories Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/faqs',
    'description' => 'FAQs Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/global-dpi-summit',
    'description' => 'global-dpi-summit Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/inclusivity-pulse',
    'description' => 'Inclusivity Pulse Page',
],
[
    'method' => 'GET',
    'endpoint' => '/api/about-us',
    'description' => 'Home Page About Us Data',
],
[
    'method' => 'GET',
    'endpoint' => '/api/infrastructure-thinking',
    'description' => 'Home Page Infrastructure Thinking Data',
],
[
    'method' => 'GET',
    'endpoint' => '/api/government-solutions',
    'description' => 'Home Page Government Solutions Data',
],
[
    'method' => 'GET',
    'endpoint' => '/api/home-partners',
    'description' => 'Home Page Partners Data',
],
[
    'method' => 'GET',
    'endpoint' => '/api/countries',
    'description' => 'Countries Data',
],
[
    'method' => 'GET',
    'endpoint' => '/api/country/{slug}',
    'description' => 'Country Data by Slug',
],
[
    'method' => 'GET',
    'endpoint' => '/api/highlights',
    'description' => 'Home PAGE hIGHLIGHTS',
],
[
    'method' => 'GET',
    'endpoint' => '/api/impact',
    'description' => 'Home PAGE Impact',
],
[
    'method' => 'GET',
    'endpoint' => '/api/event-highlight',
    'description' => 'Home PAGE event-highlight',
],
];
    @endphp
                            @foreach ($apis as $index => $api)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                            {{ $api['method'] }} {{ $api['endpoint'] }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#apiAccordion">
                                        <div class="accordion-body">
                                            <p><strong>Description:</strong> {{ $api['description'] }}</p>
                                            <p><strong>Method:</strong>
                                                <span
                                                    class="badge bg-{{ $api['method'] == 'GET' ? 'primary' : 'success' }}">{{ $api['method'] }}</span>
                                            </p>
                                            <p><strong>Endpoint:</strong> <code>{{ $api['endpoint'] }}</code></p>
                                            <p><strong>Full URL:</strong>
                                                <code>{{ url($api['endpoint']) }}</code>
                                            </p>

                                            @if($api['method'] === 'POST' && isset($api['request_example']))
                                                <div class="mt-3">
                                                    <strong>Request Body (JSON):</strong>
                                                    <pre class="bg-light p-3 rounded"><code class="json">{!! json_encode($api['request_example'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}</code></pre>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <style>
                            code {
                                background-color: #f8f9fa;
                                padding: 2px 6px;
                                border-radius: 4px;
                                font-size: 90%;
                            }
                            pre code {
                                background-color: transparent;
                                padding: 0;
                            }
                        </style>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
