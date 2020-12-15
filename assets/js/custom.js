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
		var comment_area = $("#comment_area").val();
		var content_id = $("#content_id").val();
		var user_id = $("#user_id").val();
		if(comment_area){
			$.post("/ajax",
			{
				"comment" : comment_area,
				"user_id" : user_id,
				"content_id" : content_id,
				"type" : "comment"
			});
		}
	});
	$("#wishlist").click(function(){
		var content_id = $("#content_id").val();
		var user_id = $("#user_id").val();
		$.post("/ajax",
		{
			"content_id" : content_id,
			"user_id" : user_id,
			"type" : "wishlist"
		},function(data){
			if(data.status == "added"){
				alert(data.message);
			}
		},"json");
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
	if(confirm("ara you sure")){
		$.post("/creator/ajax",
		{
			"action" : "delete",
			"content_id" : content.id,
			"type" : type
		},function(data){
			alert(data);
			location.reload();
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
			location.reload();
		});
	}
}

function forgot_password(action){
	var email = $("#email-input").val();
	var code = $("#code-input").val();
	var new_password = $("#new-password-input").val();
	if(action == "email"){
		$.post("forgot_password",
		{
			"is_ajax" : true,
			"type" : "email",
			"email" : email,
			"code" : code,
			"new_password" : new_password
		},function(data){
			console.log(data.message);
			if(data.error_code === "email_success"){
				$(".email-container").css({"display" : "none"});
				$(".code-container").css({"display" : "block"});
				$(".new-password-container").css({"display" : "none"});
				$(".input-info").html(" enter the code");
			}
		},"json");
	}
	else if(action == "code"){
		$.post("forgot_password",
		{
			"is_ajax" : true,
			"type" : "code",
			"email" : email,
			"code" : code,
			"new_password" : new_password
		},function(data){
			console.log(data.message);
			if(data.error_code == "code_success"){
				$(".email-container").css({"display" : "none"});
				$(".code-container").css({"display" : "none"});
				$(".new-password-container").css({"display" : "block"});
				$(".input-info").html(" enter the new password");
			}
		},"json");
	}
	else if(action == "new_password"){
		$.post("forgot_password",
		{
			"is_ajax" : true,
			"type" : "new_password",
			"email" : email,
			"code" : code,
			"new_password" : new_password
		},function(data){
			alert(data);
			console.log(data.message);
			if(data.error_code == "password_success"){
				$(".email-container").css({"display" : "none"});
				$(".code-container").css({"display" : "none"});
				$(".new-password-container").css({"display" : "block"});
			}
		},"json");
	}
}

function agreement(checkbox){
	if(checkbox.checked){
		$(".signup-btn").removeAttr("disabled");
	}
	else if(!checkbox.checked){
		$(".signup-btn").attr("disabled", "true");
	}
}

function rate_content(rating){
	var content_id = $("#content_id").val();
	
	$.post("/rate",
	{
		"content_id" : content_id,
		"rating" : rating
	},function(data){
		alert('rated this content with '+rating+' stars');
	});
}

function subscribe(){
	var creator = $("#creator_id").val();
	var user = $("#user_id").val();
	$.post("/subscribe",
	{
		"creator" : creator,
		"user" : user
	},function(data){
		alert(data);
	});
}

function payment(){
	var content_id = $("#content_id").val();
	var content_name = $("#content_name").val();
	var user_id = $("#user_id").val();
	var creator_id = $("#creator_id").val();
	if(confirm('are you sure you want to pay?')){
		$.post("/payment",
		{
			"content_id" : content_id,
			"user_id" : user_id,
			"creator_id" : creator_id
		},function(data){
			if(data.status == "success"){
				if(data.type == "video"){
					console.log(data);
					$(".video-player").attr('src','/cdn/user-content/videos/'+data.file_name);
					$(".video-player").get(0).play();
				}
				else if(data.type == "music"){
					console.log(data);
					$(".music-player").attr('src','/cdn/user-content/musics/'+data.file_name);
					$(".music-player").get(0).play();
				}
				else if(data.type == "image"){
					console.log(data);
					$(".image-viewer").attr('src','/cdn/user-content/images/'+data.file_name);
					$("#download").attr('href','/cdn/user-content/images/'+data.file_name);
					$("#download").removeClass("disabled");
				}
				else if(data.type == "app"){
					console.log(data);
					$("#download").attr('href','/cdn/user-content/apps/'+data.file_name);
					$("#download").removeClass("disabled");
				}
				else if(data.type == "book"){
					console.log(data);
					$("#download").attr('href','/cdn/user-content/books/'+data.file_name);
					$("#download").removeClass("disabled");
				}
				$(".wishlist-btn").get(0).remove();
				$(".pay-btn").get(0).remove();
				alert("payement succesful");
			}
			else if(data.status == "low balance"){
				alert("your balance is low to view this content");
			}
		},"json");
	}
}