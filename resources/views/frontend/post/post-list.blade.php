@extends('frontend.layouts.master')

@section('title')
    <title>Danh sách bài viết</title>
@endsection

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb"><a href="home.html">Trang chủ</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Blog</nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                @foreach ($listPost as $post)                    
                    <article class="post format-video hentry post_format-post-format-video">
                        <div class="media-attachment">
                            <div class="video-container">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <img width="870" height="460" src="{{ asset('storage/'.$post->thumbnail) }}" class="wp-post-image" alt="8">
                                </div>
                            </div>
                        </div>
                        <div class="content-body">
                            <header class="entry-header">
                                <h1 class="entry-title" itemprop="name headline"><a href="{{ route('home.post.detail', ['slug'=>$post->slug]) }}" rel="bookmark">{{ $post->name }}</a></h1>
                                <div class="entry-meta">
                                    <span class="posted-on"><a href="blog-single.html" rel="bookmark"><time class="entry-date published" datetime="2016-03-03T13:28:24+00:00">{{ date("d/m/Y H:i:s", strtotime($post->created_at)) }}</time> <time class="updated" datetime="2016-03-31T14:32:27+00:00" itemprop="datePublished">March 31, 2016</time></a></span>
                                </div>
                            </header><!-- .entry-header -->

                            <div class="entry-content" itemprop="articleBody">
                                {{ $post->description }}
                            </div><!-- .post-excerpt -->

                            <div class="post-readmore"><a href="{{ route('home.post.detail', ['slug'=>$post->slug]) }}" class="btn btn-primary">Read More</a></div>
                            <span class="comments-link"><a href="{{ route('home.post.detail', ['slug'=>$post->slug]) }}">Leave a comment</a></span>
                        </div>

                    </article><!-- #post-## -->
                @endforeach
                <nav class="navigation pagination">
                    {!! $listPost->links('pagination::bootstrap-4') !!}
                </nav>
            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar-blog" role="complementary">
            <aside id="search-2" class="widget widget_search">
                <form role="search" method="get" class="search-form" action="#">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field" placeholder="Search …" value="" name="keyword">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
            </aside>
            <aside class="widget electro_recent_posts_widget"><h3 class="widget-title">Bài viết mới</h3>
                <ul>
                    @foreach ($feature_posts as $feature)                        
                    <li>
                        <a class="post-thumbnail" href="{{ route('home.post.detail', ['slug'=>$feature->slug]) }}"><img width="150" height="150" src="{{ asset('storage/'.$feature->thumbnail) }}" class="wp-post-image" alt="1"></a>
                        <div class="post-content">
                            <a class="post-name" href="{{ route('home.post.detail', ['slug'=>$feature->slug]) }}">{{ $feature->name }}</a>
                            <span class="post-date">{{ date("d/m/Y H:i:s", strtotime($feature->created_at)) }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div><!-- .container -->
</div>
@endsection

@section('addJs')
    
@endsection