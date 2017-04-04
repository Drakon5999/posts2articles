<section class="posts2articles">
	<style scoped>
		.posts2articles h1 {
		
		}
		.posts2articles h2 {
			font-size: 15px;
		}
		.posts2articles img {
			max-width: 100%;
			max-height: 100px;
			vertical-align: top;
			float: left;
		}
		.posts2articles .clearfix {
			clear: both;
		}
	</style>
	<h1>Лента</h1>
	{data.data::item}
</section>

{item:} 
<hr>
<time datetime="{~date(:Y-m-d,created_time)}">{~date(:j F Y,created_time)}</time>
<h2>{message}</h2>
<a href="{link}">{title}</a>

<p><a href="{link}"><img src="{full_picture}" alt="{title}"></a>{description}<div class="clearfix"></div></p>