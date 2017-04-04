<section class="posts2articles">
	<style scoped>
		.posts2articles * a {
			color: inherit;
			font: inherit;
			text-decoration: inherit;
		}
		.posts2articles h2 {
			font-size: 15px;
		}
		.posts2articles img {
			max-width: 100%;
			max-height: 100px;
			vertical-align: top;
			float: left;
			margin-right: 5px;
		}
		.posts2articles .clearfix {
			clear: both;
		}
	</style>
	<h1>Лента</h1>
	{data.data::item}
	<br>
	Больше на нашем <a href="https://facebook.com/{~conf.posts2articles.group_id}">facebook</a>!
</section>

{item:} 
<hr>
<time datetime="{~date(:Y-m-d,created_time)}">{~date(:j F Y,created_time)}</time>
<h2><a href="{link}">{title}</a></h2>

<p><a href="{link}"><img src="{full_picture}" alt="{title}"></a><a href="{link}">{message}<br>{description}</a><div class="clearfix"></div></p>