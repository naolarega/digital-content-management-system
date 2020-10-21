$(document).ready(function(){
	$("#favorite").click(function(){
		var content_id = $("#content_id").val();
		var user_id = $("#user_id").val();
		$.post("/ajax",
		{
			"content_id" : content_id,
			"user_id" : user_id,
			"type" : "favorite"
		},
		function(data){
			alert(data);
		});
	});
	$("#comment").click(function(){
		var comment_area = $("#comment_area").html();
		var content_id = $("#content_id").val();
		var user_id = $("#user_id").val();
		$.post("/ajax",
		{
			"comment" : comment_area,
			"user_id" : user_id,
			"content_id" : content_id,
			"type" : "comment"
		},
		function(data){
			alert(data);
		});
	});
	$("#wishlist").click(function(){
		var content_id = $("#content_id").val();
		var user_id = $("#user_id").val();
		$.post("/ajax",
		{
			"content_id" : content_id,
			"user_id" : user_id,
			"type" : "wishlist"
		},
		function(data){
			alert(data);
		});
	});
	$("#subscribe").click(function(){
		var user_id = $("#user_id").val();
		var creator_id = $("#creator_id").val();
		$.post("/ajax",
		{
			"creator_id" : creator_id,
			"user_id" : user_id,
			"type" : "subscribe"
		},
		function(data){
			alert(data);
		});
	});
});