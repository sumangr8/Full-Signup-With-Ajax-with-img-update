$(document).ready(function(){
	$("#insertform").on("submit",function(e){
		e.preventDefault();
		var name=$("#name").val();
		var email=$("#email").val();
		var password=$("#password").val();
		var mobile=$("#mobile").val();
		var gender=$("#gender").val();
		var pic=$("#pic").val();

		var name_check=/^[A-Za-z. ]{3,20}$/;
		var email_check=/^[A-Za-z._0-9]{3,}@[A-Za-z]{2,}[.]{1}[A-Za-z]{3,16}$/;
		var password_check=/^(?=.*[A-Za-z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{5,15}$/;
		var mobile_check=/^[6789][0-9]{9}$/;
		var pic_check=/^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/; 
		
		if(!name_check.test(name))
		{
			$("#name_err").html("<span class='text-danger'>Name Not Valid</span>");
		}
		if(!email_check.test(email))
		{
			$("#email_err").html("<span class='text-danger'>Email Not Valid</span>");
		}
		if(!password_check.test(password))
		{
			$("#password_err").html("<span class='text-danger'>Password Not Valid</span>");
		}
		if(!mobile_check.test(mobile))
		{
			$("#mobile_err").html("<span class='text-danger'>Mobile Not Valid</span>");
		}
		if(!pic_check.test(pic))
		{
			$("#pic_err").html("<span class='text-danger'>Pic Not Valid</span>");
		}


		if((name_check.test(name)) && (email_check.test(email)) && (password_check.test(password)) && (mobile_check.test(mobile)) && (pic_check.test(pic)))
		{
			var url=BASE_URL+'Home/insert';
			$.ajax({
				url : url,
				type: 'POST',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					$("#success").html("* Insert Success");
					// console.log(data);
				}
			});
		}
	}); //insert end



	//for dispaly all record
	$("#display").click(function(){
		var url=BASE_URL+'Home/show';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(data)
			{
				var jdata=JSON.parse(data);
				// console.log(jdata);
				var html="";
				var i;
				for(i=0;i<jdata.length;i++)
				{
					var img="<img src='"+BASE_URL+'img/'+jdata[i].pic+"' style='width:80px; height:80px;'>";
					html+="<tr>"+
					"<td>"+jdata[i].id+"</td>"+
					"<td>"+jdata[i].name+"</td>"+
					"<td>"+jdata[i].email+"</td>"+
					"<td>"+img+"</td>"+
					"<td><button class='btn btn-info' id='edit' data-eid='"+jdata[i].id+"'>Edit</button></td>"+
					"<td><button class='btn btn-danger' id='delete' data-did='"+jdata[i].id+"'>Delete</button></td>"+
					"</tr>"
					;
				}
				$("#record").html(html);
			}
		});
	});



	//for edit
	$(document).on("click","#edit",function(){
		var id=$(this).attr("data-eid");
		$("#modal").show();
		var url=BASE_URL+'Home/edit';
		$.ajax({
			url : url,
			type: 'POST',
			// dataType:'json',
			data: {id:id},
			success:function(data)
			{
				var jdata=JSON.parse(data);
				var img="<img src='"+BASE_URL+'img/'+jdata[0].pic+"' style='width:80px;height:80px;'>";
				$("#id").val(jdata[0].id);
				$("#e_name").val(jdata[0].name);
				$("#e_email").val(jdata[0].email);
				$("#e_pic").val(jdata[0].pic);
				$("#img").html(img);
				// console.log(data);
			}
		});
	});


	//for update
	$("#updateform").on("submit",function(e){
		e.preventDefault();
		// var id=$("#id").val();
		// var name=$("#e_name").val();
		// var email=$("#e_email").val();
		// var old_pic=$("#e_pic").val();
		// var new_pic=$("#new_pic").val();
		// console.log(id+name+old_pic+" "+new_pic);
		var url=BASE_URL+'Home/update';
		$.ajax({
			url : url,
			type: 'POST',
			data: new FormData(this),//ye hamesa form ka name leta hai
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				console.log(data);
			}
		});
	});
});