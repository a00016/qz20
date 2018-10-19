<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"F:\phpStudy\WWW\thinkphp_5.0.12test\public/../application/index\view\index\index.html";i:1522052744;}*/ ?>
﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<script type="text/javascript" src="\static\js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript">
			$(function () {
	            $("#upload").click(function () {
	            	// 生成一个对象
	                var formData = new FormData();
	                // 获取需要上传的文件，给对象myfile后添加内容
	                formData.append("image", document.getElementById("file1").files[0]);
	                // 获取表单内容
	                name = document.getElementById("text1").value;
	                formData.append("name",name);
	                $.ajax({
	                    url: "/index/index/upload",
	                    type: "POST",
	                    data: formData,
	                    /**
	                    *必须false才会自动加上正确的Content-Type
	                    */
	                    contentType: false,
	                    /**
	                    * 必须false才会避开jQuery对 formdata 的默认处理
	                    * XMLHttpRequest会对 formdata 进行正确的处理
	                    */
	                    processData: false,
	                    success: function (data) {
	                    	alert(data);
	                        if (data == "1") {
	                            alert("上传成功！");
	                        }
	                    },
	                    error: function () {
	                        alert("上传失败！");
	                    }
	                });
	            });
	        });
		</script>
	</head>
	<body>
		<center>
			<h3>商品图片添加</h3><br>
			<form  action="/index/index/upload" method="post" enctype="multipart/form-data">
					<input type="file"  name="image">
					<textarea name="content" id="" cols="30" rows="10">123123</textarea>
					<input type="submit" value="确认添加">
			</form>
			<hr>
			<h3>ajax上传文件</h3><br>
			选择文件:<input type="file" id="file1" name="image"/><br />
			姓名:<input type="text" id="text1" name="name"/><br />
        	<input type="button" id="upload" value="上传" />
		</center>
	</body>
</html>