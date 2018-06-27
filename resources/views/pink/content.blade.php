@if($portfolios && count($portfolios)>0)
	<div id="content-home" class="content group">
	    <div class="hentry group">
	        <div class="section portfolio">
	            <h3 class="title">{{ trans('am.latest_project') }}</h3>
	            @foreach($portfolios as $key => $value)
	            	@if($key == 0)
	            		<div class="hentry work group portfolio-sticky portfolio-full-description">
			                <div class="work-thumbnail">
			                    <a class="thumb"><img src="{{ asset(env('THEME')) }}/images/projects/{{ $value->img->max }}" alt="0081" title="0081" /></a>
			                    <div class="work-overlay">
			                        <h3><a href="{{ route('portfolios.show',['alias'=>$value->alias]) }}">{{ $value->title }}</a></h3>
			                        <p class="work-overlay-categories"><img src="{{ asset(env('THEME')) }}/images/categories.png" alt="Categories" /> in: <a href="category.html">{{ $value->filter->title }}</a></p>
			                    </div>
			                </div>
			                <div class="work-description">
			                    <h2><a href="{{ route('portfolios.show',['alias'=>$value->alias]) }}">{{ $value->title }}</a></h2>
			                    <p class="work-categories">in: <a href="#">{{ $value->filter->title }}</a></p>
			                    <p>{{ str_limit($value->text,200) }}</p>
			                    <a href="{{ route('portfolios.show',['alias'=>$value->alias]) }}" class="read-more">|| Read more</a>
			                </div>
	            		</div>
			            <div class="clear"></div>
			            @continue
	            	@endif	
			        @if($key == 1)
			            <div class="portfolio-projects">
			        @endif
						    <div class="related_project {{ ($key == 4) ? 'related_project_last' : ''}}">
						        <div class="overlay_a related_img">
						            <div class="overlay_wrapper">
						                <img src="{{ asset(env('THEME')) }}/images/projects/{{ $value->img->mini }}" alt="0061" title="0061" />						
						                <div class="overlay">
						                    <a class="overlay_img" href="images/projects/{{ $value->img->path }}" rel="lightbox" title=""></a>
						                    <a class="overlay_project" href="{{ route('portfolios.show',['alias'=>$value->alias]) }}"></a>
						                    <span class="overlay_title">{{ $value->title }}</span>
						                </div>
						            </div>
						        </div>
						        <h4><a href="{{ route('portfolios.show',['alias'=>$value->alias]) }}">{{ $value->title }}</a></h4>
						        <p>{{ str_limit($value->text,200) }}</p>
						    </div>
			        @endforeach
						</div>
	        </div>
        </div>
        <div class="clear"></div>
	</div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
@else
<p>Content is Worqing with developers</p>
@endif
