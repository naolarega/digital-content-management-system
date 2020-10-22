var edit_content_id = "";
var edit_type = "";

$(document).ready(function(){
	$("#favorite").click(function(){
		var content_id = $("#content_id").val();
		var user_id = $("#user_id").val();
		$.post("/ajax",
		{
			"content_id" : content_id,
			"user_id" : user_id,
			"type" : "favorite"
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
		});
	});
	$(".edit-cancel").click(function(){
		$("#edit-title").val("");
		$("#edit-description").val("");
		$("#edit-tags").val("general");
		edit_content_id = "";
		edit_type = "";
	});
});
function delete_user(content, type){
	var type = type;
	$.post("/user/ajax",
	{
		"content_id" : content.id,
		"type" : type
	});
	location.reload();
}
function delete_creator_content(content, type){
	if(confirm("ara yout sure")){
		$.post("/creator/ajax",
		{
			"action" : "delete",
			"content_id" : content.id,
			"type" : type
		},function(data){
			alert(data);
		});
	}
}
function edit_creator_content(content, type, action){
	if(action == 'modal'){
		edit_content_id = content.id;
		edit_type = type;
	}
	else if(action == 'done'){
		var title = $("#edit-title").val();
		var description = $("#edit-description").val();
		var tags = $("#edit-tags").val();
		$.post("/creator/ajax",
		{
			"action" : "edit",
			"content_id" : edit_content_id,
			"title" : title,
			"description" : description,
			"tags" : tags,
			"type" : edit_type
		},function(data){
			alert(data);
		});
	}
}