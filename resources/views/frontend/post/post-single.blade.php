@extends('frontend.layouts.master')

@section('content')
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav itemprop="breadcrumb" class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><a href="#">Design</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Robot Wars – Post with Gallery</nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="post type-post status-publish format-gallery has-post-thumbnail hentry">
                    <div class="media-attachment">
                        <div class="media-attachment-gallery">
                            <div class=" ">
                                <div class="item">
                                    <figure>
                                        <img width="1144" height="600" src="{{ asset('storage/'.$post->thumbnail) }}" class="attachment-post-thumbnail size-post-thumbnail" alt="1">
                                    </figure>
                                </div><!-- /.item -->
                            </div>
                        </div><!-- /.media-attachment-gallery -->
                    </div>

                    <header class="entry-header">
                        <h1 class="entry-title" itemprop="name headline">{{ $post->name }}</h1>

                        <div class="entry-meta">
                            <span class="cat-links"><a href="#" rel="category tag">Design</a>, <a href="#" rel="category tag">Technology</a></span>
                            <span class="posted-on"><a href="#" rel="bookmark"><time class="entry-date published" datetime="2016-03-04T07:34:20+00:00">{{ date("d/m/Y H:i:s", strtotime($post->created_at)) }}</time></a></span>
                        </div>
                    </header><!-- .entry-header -->

                    <div class="entry-content" itemprop="articleBody">
                        {!! $post->content !!}
                    </div><!-- .entry-content -->
                </article>
                <nav class="navigation post-navigation">
                    <h2 class="screen-reader-text">Post navigation</h2>
                    <div class="nav-links"><div class="nav-previous"><a rel="prev" href="#"><span class="meta-nav">←</span>&nbsp;Robot Wars – Now Closed – Post with Audio</a></div></div>
                </nav>
            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar-blog" role="complementary">
            <aside class="widget electro_recent_posts_widget"><h3 class="widget-title">Recent Posts</h3>
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